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
        $hashpassword = password_hash($user_password,PASSWORD_DEFAULT);
        $user_number = $this->request->getPost('number', FILTER_SANITIZE_NUMBER_INT);

        $customer_manager = new Customer();

        $data = [
            'customers_username' => $user_name,
            'customers_password'=> $hashpassword ,
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
                        $message = '<div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        Le lien pour réinitialiser votre mot de passe vous à été envoyé par mail. Il est valide pour 10 min.
                                    </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        $password_manager->update_email_token($token, $send_link ['row']['customers_id']);
                    }
                else{
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                   Le lien de réinitialisation n\'à pas été envoyé, Merci de réessayer.
                                </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        return;
                }
    
            } else {
                        $message = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    Cette adresse email n\'appartient à aucun utilisateur.
                                </div>';
                        echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                        return;
            }
        }else{
                $message = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                Votre Compte n\'est pas actif, Merci de contacter la présidence de Beautyfashion pour sa réactivation.
                            </div>';
                echo view('frontend/layout/users/user_forgotpassword_screen', array('special_message' => $message));
                return;
        }
        return view('frontend/layout/users/user_forgotpassword_screen');
    }
}
