<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;

class TwoFactor extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $validation_rules = array(
            'email' => [
                'label'  => 'Veuillez entrer votre adresse email',
                'rules'  => 'required|valid_email|is_not_unique[users.user_email]',
                'errors' => [
                    'required' => "Veuillez saisir votre adresse email",
                    'valid_email' => "Merci de saisir une adresse email valide",
                    'is_not_unique' => "Cette adresse email n'est pas reconnu"
                ],

            ]
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('backend/layout/two_factor', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = session()->getFlashdata('special_message');
                    echo view('backend/layout/two_factor', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $password_manager = new User();
        $user_email = $this->request->getPost('email', FILTER_SANITIZE_STRING);

        $send_link = $password_manager->verifyEmail($user_email);

        if($send_link ['row']['account_status'] == 'ACTIVE'){
            if ($send_link) {
                $email = \Config\Services::email();
    
                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($user_email);    
                $two_factor_code = rand(1111, 9999); 
                $token = bin2hex(random_bytes(32)); 
                
                $data = [
                    
                    'token' => $token,
                    'code' => $two_factor_code,
                    'user_fullname' => $send_link['row']['full_name']
                ];
                $message = view('email_template/two_factor', $data);
                $email->setSubject('Authentification Double Facteur');
                $email->setMessage($message);
                if($email->send()){
                        $message = '<div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        Le code vous à été envoyé par mail. Il est valide pour 10 min.
                                    </div>';
                        echo view('backend/layout/two_factor', array('special_message' => $message));
                        $password_manager->update_email_token($token, $send_link ['row']['user_id']);
                        $password_manager->insert_code($two_factor_code, $send_link ['row']['user_id']);
                    }
                else{
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                   Le code n\'à pas été envoyé, Merci de réessayer.
                                </div>';
                        echo view('backend/layout/two_factor', array('special_message' => $message));
                        return;
                }
    
            } else {
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    Cette adresse email n\'appartient à aucun utilisateur.
                                </div>';
                        echo view('backend/layout/two_factor', array('special_message' => $message));
                        return;
            }
        }else{
                $message = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                Votre Compte n\'est pas actif, Merci de contacter la présidence de Beautyfashion pour sa réactivation.
                            </div>';
                echo view('backend/layout/two_factor', array('special_message' => $message));
                return;
        }
        //return view('backend/layout/two_factor_login');
    }

    public function login($token = null)
    {
        $validation_rules = array(
            'code' => [
                'label'  => "Veuillez saisir le code reçu par mail",
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => "Veuillez saisir le code reçu par mail",
                    'numeric' => "Veuillez saisir le code reçu par mail",
                ],

            ],
        );

        $code_manager = new User();
        if(!empty($token)){
            if($update_time = $code_manager->verifyToken($token)){
                if($expiration= $code_manager->checkExpireDate($update_time)){
                    if ($this->validate($validation_rules) === false) {
                        $method = $this->request->getMethod();
                        switch ($method) {
                            case 'post':
                                echo view('backend/layout/two_factor_login', [
                                    'token' => $token,
                                    'validation' => $this->validator
                                ]);
                                break;
                            case 'get':
                                $message = session()->getFlashdata('special_message');
                                echo view('backend/layout/two_factor_login', [
                                    'token' => $token,
                                    'special_message' => $message
                                ]);
                                break;
                            default:
                                die('something is wrong here');
                        }
                        return;
                    }
                    
                    
                    $code = $this->request->getPost('code', FILTER_SANITIZE_NUMBER_INT);
        
        
                    $Code_verify = $code_manager->verifyCode($code);
        
                    if($Code_verify){
                        if($Code_verify['row']['account_status']==='ACTIVE'){              
        
                            $data = array(
                                'user_id'       => $Code_verify['row']['user_id'],
                                'user_name'       => $Code_verify['row']['user_name'],
                                'full_name'    => $Code_verify['row']['full_name'],
                                'user_email'  => $Code_verify['row']['user_email'],
                                'can_add_admin'  => $Code_verify['row']['can_add_admin'],
                                'account_status'  => $Code_verify['row']['account_status'],
                                'user_pic'  => $Code_verify['row']['profil_image'],
                                'double_factor'  => $Code_verify['row']['double_factor'],
                                'logged_in'         => true
                            ); 
                            session()->set($data);
                
                            return redirect()->to(base_url('common/dashboard')); 
                        }
                        else{
                            $message = '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        Votre Compte n\'est pas actif. Merci de contacter les administrateurs
                                    </div>';
                            return view('backend/layout/two_factor_login', [
                                    'token' => $token,
                                    'special_message' => $message
                            ]);
                        }
                    }else{
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        Ce code est invalide.
                                    </div>';
                        return view('backend/layout/two_factor_login', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }
            
                }else{
                    $message = "<div class='alert alert-danger' role='alert'>Le lien a expiré.</div>";
                    return view('backend/layout/two_factor_login', array('error_message' => $message));
                }
            }else{
                $message = "<div class='alert alert-danger' role='alert'>Ce lien de  n'est pas réconnu</div>";
                return view('backend/layout/two_factor_login', array('error_message' => $message));
            }
        
        }else{
            $message = "<div class='alert alert-danger' role='alert'>Accès non authorisé. Merci de vous identifier</div>";
            return view('backend/layout/two_factor_login', array('error_message' => $message));
         }
        
        
        //return  view('backend/layout/reset_password');
    }

    public function desactivate()
    {
        $validation_rules = array(
            'UserCode' => [
                'label'  => 'Identifiant Utilisateur',
                'rules'  => 'required|in_list['.session('user_id').']'
            ],
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('backend/layout/profil', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = session()->getFlashdata('special_message');
                    echo view('backend/layout/profil', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }
        
        $user_model = new User();
    
        if( $remove= $user_model ->desactivate_2factor(session('user_id'))){
            session()->setFlashdata('success_message', 'L\'authentification à double Facteur a été désactivé avec succès.');
            session()->set('double_factor', 'NO');
            return redirect()->to(base_url('common/dashboard/profil'));
        }
        else
        {
            session()->setFlashdata('error_message', 'Une erreur est survenue, merci de reesayer.');
            return redirect()->to(base_url('common/dashboard/profil'));
        }
        
        //return view('backend/layout/profil');
    }

    public function activate()
    {
        $validation_rules = array(
            'UserCode' => [
                'label'  => 'Identifiant Utilisateur',
                'rules'  => 'required|in_list['.session('user_id').']'
            ],
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('backend/layout/profil', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = session()->getFlashdata('special_message');
                    echo view('backend/layout/profil', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }
        
        $user_model = new User();
    
        if( $remove= $user_model ->activate_2factor(session('user_id'))){
            session()->setFlashdata('success_message', 'L\'authentification à double Facteur a été activé avec succès.');
            session()->set('double_factor', 'YES');
            return redirect()->to(base_url('common/dashboard/profil'));
        }
        else
        {
            session()->setFlashdata('error_message', 'Une erreur est survenue, merci de reesayer.');
            return redirect()->to(base_url('common/dashboard/profil'));
        }
        
        //return view('backend/layout/profil');
    }
}
