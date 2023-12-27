<?php

namespace App\Controllers\Common\Adminspace;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    protected $helpers = ['form'];


    public function index()
    {
        
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('common/adminspace/dashboard'));
        }
       
     
        $session = \Config\Services::session();
        $validation_rules = array(
            'username' => [
                'label'  => "Nom d'utilisateur",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom d'utilisateur",
                ],

            ],
            'password' => [
                'label'  => 'Mot de passe',
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre mot de passe",
                ],

            ]
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('backend/layout/login', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $session->getFlashdata('special_message');
                    echo view('backend/layout/login', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $login_manager = new User();
        $user_name = $this->request->getPost('username', FILTER_SANITIZE_STRING);
        $user_password = $this->request->getPost('password', FILTER_SANITIZE_STRING);

        $user_details = $login_manager->get_permissions($user_name, $user_password);

        if (is_null($user_details)) {
            $message = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Nom d\'utilisateur ou Mot de passe invalide.
                        </div>';
            echo view('backend/layout/login', array('special_message' => $message));
            return;
        } else {
            if($user_details['user_details']['account_status']==='ACTIVE'){              

                if($user_details['user_details']['double_factor']==='YES'){

                    return redirect()->to(base_url('common/twofactor'));
                }
                else{
                    $data = array(
                        'user_id'       => $user_details['user_details']['user_id'],
                        'user_name'       => $user_details['user_details']['user_name'],
                        'full_name'    => $user_details['user_details']['full_name'],
                        'user_email'  => $user_details['user_details']['user_email'],
                        'can_add_admin'  => $user_details['user_details']['can_add_admin'],
                        'account_status'  => $user_details['user_details']['account_status'],
                        'user_pic'  => $user_details['user_details']['profil_image'],
                        'double_factor'  => $user_details['user_details']['double_factor'],
                        'logged_in'         => true
                    ); 
                    $session->set($data);
    
                    return redirect()->to(base_url('common/adminspace/dashboard'));
                }
                
            }
            else{
                $message = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Votre Compte n\'est pas actif. Merci de contacter les administrateurs
                        </div>';
                echo view('backend/layout/login', array('special_message' => $message));
                return;
            }
        }
        
    }

    public function forgotpassword()
    {
        $session = \Config\Services::session();
        $validation_rules = array(
            'email' => [
                'label'  => 'Email',
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
                    echo view('backend/layout/forgot-password', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $session->getFlashdata('special_message');
                    echo view('backend/layout/forgot-password', array('special_message' => $message));
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
                $token = bin2hex(random_bytes(32)); 
                $data = [
                    
                    'token' => $token,
                    'user_fullname' => $send_link['row']['full_name']
                ];
                $message = view('email_template/forgotpassword', $data);
                $email->setSubject('Demande de réinitialisation du mot de passe');
                $email->setMessage($message);
                if($email->send()){
                        $message = '<div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        Le lien pour réinitialiser votre mot de passe vous à été envoyé par mail. Il est valide pour 10 min.
                                    </div>';
                        echo view('backend/layout/forgot-password', array('special_message' => $message));
                        $password_manager->update_email_token($token, $send_link ['row']['user_id']);
                    }
                else{
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                   Le lien de réinitialisation n\'à pas été envoyé, Merci de réessayer.
                                </div>';
                        echo view('backend/layout/forgot-password', array('special_message' => $message));
                        return;
                }
    
            } else {
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    Cette adresse email n\'appartient à aucun utilisateur.
                                </div>';
                        echo view('backend/layout/forgot-password', array('special_message' => $message));
                        return;
            }
        }else{
                $message = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                Votre Compte n\'est pas actif, Merci de contacter la présidence de Beautyfashion pour sa réactivation.
                            </div>';
                echo view('backend/layout/forgot-password', array('special_message' => $message));
                return;
        }
        
    }

    public function reset_password($token = null)
    {
        $validation_rules = array(
            'password1' => [
                'label'  => 'Saisir nouveau mot de passe',
                'rules'  => 'required|min_length[5]|max_length[10]',
                'errors' => [
                    'required' => "Veuillez saisir votre nouveau mot de passe",
                    'min_length' => "Le nouveau mot de passe ne peut pas contenir moins de 5 caratères",
                    'max_length' => "Le nouveau mot de passe ne peut pas contenir plus de 10 caratères",
                ],

            ],
            'password2' => [
                'label'  => 'Email',
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required' => "Veuillez saisir votre adresse email",
                    'matches' => "Les mots de passe ne correspondent pas",
                ],

            ]
        );

        $password_manager = new User();

        if(!empty($token)){
            if($update_time = $password_manager->verifyToken($token)){
                if($expiration= $password_manager->checkExpireDate($update_time)){
                    if ($this->validate($validation_rules) === false) {
                        $method = $this->request->getMethod();
                        switch ($method) {
                            case 'post':
                                echo view('backend/layout/reset_password', [
                                    'token' => $token,
                                    'validation' => $this->validator
                                ]);
                                break;
                            case 'get':
                                $message = $this->session->getFlashdata('special_message');
                                echo view('backend/layout/reset_password', [
                                    'token' => $token,
                                    'special_message' => $message
                                ]);
                                break;
                            default:
                                die('something is wrong here');
                        }
                        return;
                    }
                    
                    $user_password = $this->request->getPost('password1');
                    $change_password = $password_manager->reset_user_password($token, $user_password);

                    if($change_password){
                        $message = "<div class='alert alert-success' role='alert'>Le mot de passe à été changé avec success.</div>";
                        return view('backend/layout/reset_password', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }else{
                        $message = "<div class='alert alert-danger' role='alert'>Le mot de passe n'à été changé. Merci de réessayer.</div>";
                        return view('backend/layout/reset_password', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }
            
                }else{
                    $message = "<div class='alert alert-danger' role='alert'>Le lien de réinitialisation du mot de passe a expiré.</div>";
                    return view('backend/layout/reset_password', array('error_message' => $message));
                }
            }else{
                $message = "<div class='alert alert-danger' role='alert'>Le lien de réinitialisation du mot de passe n'est pas réconnu</div>";
                return view('backend/layout/reset_password', array('error_message' => $message));
            }

        }else{
            $message = "<div class='alert alert-danger' role='alert'>Accès non authorisé. Merci de vous identifier</div>";
            return view('backend/layout/reset_password', array('error_message' => $message));
         }
        
        return  view('backend/layout/reset_password');
    }

    public function activation($token = null)
    {
        $user_model = new User();
        
        if(!empty($token)){
            if($update_time = $user_model->verifyToken($token)){
                if($expiration= $user_model->checkExpireDate($update_time)){
    
                    if ($account_validate = $user_model->validate_AccountActivation($token)) {
                        // La mise à jour du statut a réussi
                        $message = "<div class='alert alert-success' role='alert'>Votre compte a été activé avec succès.</div>";
                        return view('backend/layout/admin_activation', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }else{
                        // La mise à jour du statut a échoué
                        $message = "<div class='alert alert-danger' role='alert'>Votre Compte n'a pas été activé. Merci de réessayer</div>";
                            return view('backend/layout/admin_activation', [
                                'token' => $token,
                                'error_message' => $message
                            ]);
                    }
                   
                }else{
                    $message = "<div class='alert alert-danger' role='alert'>Ce lien d'activation a expiré </div>";
                    return view('backend/layout/admin_activation', array('error_message' => $message));
                }
            }else{
                $message = "<div class='alert alert-danger' role='alert'>Une erreur est survenue, Utilisateur non reconnu</div>";
                return view('backend/layout/admin_activation', array('error_message' => $message));
            }
        }else{
            $message = "<div class='alert alert-danger' role='alert'>L'accès à cette page n'est authorisé</div>";
            return view('backend/layout/admin_activation', array('error_message' => $message));
        }
        //return view('backend/layout/admin_activation');
    }

}
