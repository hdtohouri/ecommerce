<?php

namespace App\Controllers\Common\Users;

use App\Controllers\BaseController;
use App\Models\Customer;

class Login extends BaseController
{
    protected $helpers = ['form'];
    
    public function index()
    {
        if ($this->session->get('is_logged_in')) {
            return redirect()->to(base_url());
        }

        $validation_rules = array(
            'username' => [
                'label'  => "Veuillez saisir votre nom d'utilisateur",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom d'utilisateur",
                ],

            ],
            'password' => [
                'label'  => 'Veuillez saisir votre mot de passe',
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
                    echo view('frontend/layout/users/user_login_screen', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('frontend/layout/users/user_login_screen', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $login_manager = new Customer();
        $customer_username = $this->request->getPost('username', FILTER_SANITIZE_STRING);
        $customer_password = $this->request->getPost('password', FILTER_SANITIZE_STRING);

        $customer_details = $login_manager->get_customer_permissions($customer_username, $customer_password);

        if (is_null($customer_details)) {
            $message = "<div class='alert alert-danger' role='alert'>Nom d'utilisateur ou Mot de passe invalide.</div>";
            echo view('frontend/layout/users/user_login_screen', array('special_message' => $message));
            return;
        } else {
            if($customer_details['customers_details']['customers_account_status']==='ACTIVE'){
                $data = array(
                    'customers_id'             => $customer_details['customers_details']['customers_id'],
                    'customers_username'       => $customer_details['customers_details']['customers_username'],
                    'customers_location'       => $customer_details['customers_details']['customers_location'],
                    'customers_account_status' => $customer_details['customers_details']['customers_account_status'],
                    'customers_number' => $customer_details['customers_details']['customers_number'],
                    'is_logged_in'             => true
                ); 
    
                session()->set($data);
    
                return redirect()->to(base_url());
            }
            else{
                $message = "<div class='alert alert-danger' role='alert'>Votre Compte n'est pas actif. Merci de contacter les administrateurs</div>";
                echo view('frontend/layout/users/user_login_screen', array('special_message' => $message));
                return;
            }
        }

        //return view('frontend/layout/users/user_login_screen');
    }

    public function register()
    {
        $validation_rules = array(
            'username' => [
                'label'  => "Veuillez saisir votre nom d'utilisateur",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom d'utilisateur",
                ],

            ],
            'password' => [
                'label'  => 'Veuillez saisir votre mot de passe',
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre mot de passe",
                ],

            ],
            'location' => [
                'label'  => 'Veuillez saisir votre adresse de livraison',
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre adresse de livraison",
                ],
            ],
            'number' => [
                'label'  => 'Veuillez saisir votre numero de téléphone',
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre numero de téléphone",
                ],

            ],
            'email' => [
                'label'  => 'Veuillez saisir votre adresse email',
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre adresse emai",
                ],

            ]
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('frontend/layout/users/user_register_screen', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('frontend/layout/users/user_register_screen', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $user_name = $this->request->getPost('username', FILTER_SANITIZE_STRING);
        $user_password = $this->request->getPost('password', FILTER_SANITIZE_STRING);
        $user_location = $this->request->getPost('location', FILTER_SANITIZE_STRING);
        $user_email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $hashpassword = password_hash($user_password,PASSWORD_DEFAULT);
        $user_number = $this->request->getPost('number', FILTER_SANITIZE_NUMBER_INT);

        $customer_manager = new Customer();

        $data = [
            'customers_username' => $user_name,
            'customers_password'=> $hashpassword ,
            'customers_email'  => $user_email ,
            'customers_location'=> $user_location,
            'customers_number'=> $user_number,
        ];
        
        $insert = $customer_manager->insert_data($data);

        if( is_null($insert) )
	    {
            $message = "<div class='alert alert-danger' role='alert'> L'inscription n'a pas été éffecutée. Merci de reésayer.</div>";
            echo view('frontend/layout/users/user_register_screen', array('special_message' => $message));
            return;
        }
        else {
            $message = "<div class='alert alert-success' role='alert'>Votre inscription a bien été pris en compte.</div>";
            echo view('frontend/layout/users/user_register_screen', array('special_message' => $message));
            return;
        }
    }

    public function forgotuserpassword()
    {
        $validation_rules = array(
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email|is_not_unique[customers.customers_email]|is_not_unique[customers.customers_email]',
                'errors' => [
                    'required' => "Veuillez saisir votre adresse email",
                    'valid_email' => "Merci de saisir une adresse email valide",
                    'is_not_unique' => "Cette adrese email n'appartient à aucun compte",
                ],

            ]
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    echo view('frontend/layout/users/user_forgotpassword_screen', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $password_manager = new Customer();
        $user_email = $this->request->getPost('email', FILTER_SANITIZE_STRING);

        $send_link = $password_manager->verifyEmail($user_email);

        if($send_link ['row']['customers_account_status'] == 'ACTIVE'){
            if ($send_link) {
                $email = \Config\Services::email();
    
                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($user_email);    
                $token = bin2hex(random_bytes(32)); 
                $data = [
                    
                    'token' => $token,
                    'user_fullname' => $send_link['row']['customers_username']
                ];
                $message = view('email_template/forgotpassword', $data);
                $email->setSubject('Demande de réinitialisation du mot de passe');
                $email->setMessage($message);
                if($email->send()){
                        $message = '<div class="alert alert-success">
                                        Le lien pour réinitialiser votre mot de passe vous à été envoyé par mail. Il est valide pour 10 min.
                                    </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        $password_manager->update_email_token($token, $send_link ['row']['customers_id']);
                    }
                else{
                        $message = '<div class="alert alert-danger">
                                   Le lien de réinitialisation n\'à pas été envoyé. Merci de réessayer.
                                </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        return;
                }
    
            } else {
                        $message = '<div class="alert alert-danger">
                                    Cette adresse email n\'appartient à aucun utilisateur.
                                </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        return;
            }
        }else{
                $message = '<div class="alert alert-danger">
                                Votre Compte n\'est pas actif. Merci de contacter la présidence de Beautyfashion pour sa réactivation.
                            </div>';
                echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                return;
        }
        return view('frontend/layout/users/user_forgotpassword_screen');
    }

    public function reset_password($token = null)
    {
        $validation_rules = array(
            'password' => [
                'label'  => 'Saisir nouveau mot de passe',
                'rules'  => 'required|min_length[5]|max_length[10]',
                'errors' => [
                    'required' => "Veuillez saisir votre nouveau mot de passe",
                    'min_length' => "Le nouveau mot de passe ne peut pas contenir moins de 5 caratères",
                    'max_length' => "Le nouveau mot de passe ne peut pas contenir plus de 10 caratères",
                ],

            ],
            'password1' => [
                'label'  => 'Email',
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required' => "Veuillez saisir le nouveau mot de passe",
                    'matches' => "Les mots de passe ne correspondent pas",
                ],

            ]
        );

        $password_manager = new Customer();

        if(!empty($token)){
            if($update_time = $password_manager->verifyToken($token)){
                if($expiration= $password_manager->checkExpireDate($update_time)){
                    if ($this->validate($validation_rules) === false) {
                        $method = $this->request->getMethod();
                        switch ($method) {
                            case 'post':
                                echo view('frontend/layout/users/reset_user_password', [
                                    'token' => $token,
                                    'validation' => $this->validator
                                ]);
                                break;
                            case 'get':
                                $message = session()->getFlashdata('special_message');
                                echo view('frontend/layout/users/reset_user_password', [
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
                        return view('frontend/layout/users/reset_user_password', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }else{
                        $message = "<div class='alert alert-danger' role='alert'>Le mot de passe n'à été changé. Merci de réessayer.</div>";
                        return view('frontend/layout/users/reset_user_password', [
                            'token' => $token,
                            'special_message' => $message
                        ]);
                    }
            
                }else{
                    $message = "<div class='alert alert-danger' role='alert'>Le lien de réinitialisation du mot de passe a expiré.</div>";
                    return view('frontend/layout/users/reset_user_password', array('error_message' => $message));
                }
            }else{
                $message = "<div class='alert alert-danger' role='alert'>Le lien de réinitialisation du mot de passe n'est pas réconnu</div>";
                return view('frontend/layout/users/reset_user_password', array('error_message' => $message));
            }

        }else{
            $message = "<div class='alert alert-danger' role='alert'>Accès non authorisé. Merci de vous identifier</div>";
            return view('frontend/layout/users/reset_user_password', array('error_message' => $message));
         }
        
        return  view('frontend/layout/users/reset_user_password');
    }
}
