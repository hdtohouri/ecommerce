<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Category;
use App\Models\Contactus;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\Products;

//use function PHPUnit\Framework\isNull;

class Dashboard extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $manage_notification = new Contactus();
        $data['message'] = $manage_notification->where('read_message','NO')->countAllResults();
        return view('backend/layout/template/left-sidebar.php',$data);
    }

    public function index()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
        } else {
            $pager = \Config\Services::pager();
            $model = new Orders();
            $Customer = new Customer();
            
            $data = [];
            $data = [
                'orders' => $model->orderBy('order_date', 'desc')->paginate(10, 'orders'),
                'pager' => $model->pager,
            ];

           $data['commandes'] = $model->countAllResults();
           $data['customers'] = $Customer->countAllResults();
            
            return view('dashboard', $data);    
        }
    }

    public function profil()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
        } else {
            return view('backend/layout/profil');
        }
    }

    public function update_informations()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
        } else {
            $validation_rules = array(
                'name' => [
                    'label'  => 'Veuillez saisir votre nom complet',
                    'rules'  => 'string',
                    'errors' => [
                        'min_length' =>  'Le nom complet doit contenir minimum 5 caractères',
                        'max_length' =>  'Le nom complet doit contenir plus de 30 caractères',
                    ],
                ],
                'username' => [
                    'label'  => "Veuillez saisir votre nom d'utilisateur",
                    'rules'  => 'min_length[5]|permit_empty',
                    'errors' => [
                        'min_length' =>  "Le nom d'utilisateur ne peut pas contenir moins de 5 caractères",
                    ],
                ],
                'email' => [
                    'Veuillez saisir votre adresse email',
                    'rules'  => 'valid_email|permit_empty|is_unique[users.user_email]',
                    'errors' => [
                        'valid_email' =>  'Cette adresse email nest pas valide.',
                        'is_unique' =>  'Un administrateur avec Cette adresse email existe deja.',
                    ],
                ],
            );

            if ($this->validate($validation_rules) === false) {
                $method = $this->request->getMethod();
                switch ($method) {
                    case 'post':
                        echo view('backend/layout/profil', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('backend/layout/profil', array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }

            $userinfos = new User();

            $user_name = $this->request->getPost('name');
            $username = $this->request->getPost('username');
            $user_email = $this->request->getPost('email');

            $data = [];


            if (!empty($user_name)) {
                $data['full_name'] = $user_name;
            }

            if (!empty($user_email)) {
                $data['user_email'] = $user_email;
            }
            if (!empty($username)) {
                $data['user_name'] = $username;
            }

            if(empty($data)) {
                $this->session->setFlashdata('error_message', 'Merci de saisir les informations');
                return redirect()->to(base_url('common/dashboard/profil'));
            }
            $updated = $userinfos->update_data(session('user_id'), $data);
            
            if ($updated) {
                $this->session->set($data);
                $this->session->setFlashdata('success_message', 'Mise à Jour éffectuée avec succès.');
                return redirect()->to(base_url('common/dashboard/profil'));
                
            } else {
                $this->session->setFlashdata('error_message', 'Une erreur est survenue. Merci de reésayer');
                return redirect()->to(base_url('common/dashboard/profil'));
            }
        }
    }

    public function password_update()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
           
        } else {
            $validation_rules = array(
                'actuelpassword' => [
                    'label'  => 'Veuillez saisir votre Mot de passe Actuel',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Veuillez entrer votre mot de passe actuel',
                    ],
                ],
                'password1' => [
                    'label'  => 'Veuillez saisir votre nouveau Mot de passe',
                    'rules'  => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Veuillez entrer le nouveau mot de passe',
                        'min_length' =>  'Le mot de passe doit contenir minimum 5 charactères',
                    ],
                ],
                'password2' => [
                    'label'  => 'Veuillez ressaisir votre nouveau Mot de passe',
                    'rules'  => 'required|matches[password1]',
                    'errors' => [
                        'required' => 'Veuillez ressaisir le nouveau mot de passe',
                        'matches' =>  'Le mot de passe saisi ne correspond pas',
                    ],
                ],
            );
            
            if( $this->validate($validation_rules) === false )
            {
                $method = $this->request->getMethod();
                switch( $method ){
                    case 'post':
                        echo view('backend/layout/profil', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('backend/layout/profil', array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }
    
            $userpassword = new User();

            $user_actuel_password = $this->request->getPost('actuelpassword');
            $user_new_password1 = $this->request->getPost('password1');
            $user_new_password2 = $this->request->getPost('password2');

            $verify_actual_password = $userpassword->get_permissions(session('user_name'), $user_actuel_password);
            
            if($verify_actual_password)
            {

                $new_password = password_hash($user_new_password1, PASSWORD_DEFAULT);
                $data = [
                    'user_password' => $new_password,
                ];

                $update_password = $userpassword->update_data(session('user_id'), $data);

                if($verify_actual_password)
                {
                    $this->session->setFlashdata('success_message', 'Mot de passe modifié avec succès.');
                    return redirect()->to(base_url('common/dashboard/profil'));
                }
                else{
                    $this->session->setFlashdata('error_message', 'Échec de la modification du mot de passe.');
                    return redirect()->to(base_url('common/dashboard/profil'));
                } 
            }else{
                $this->session->setFlashdata('error_message', 'Le mot de passe actuel saisit ne correspond pas.');
                return redirect()->to(base_url('common/dashboard/profil'));
            } 
        }
    }

    public function add_admin()
    { 
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else
            {
                $validation_rules = array(
                    'Username' => [
                        'label'  => "Veuillez saisir le Username",
                        'rules'  => 'required|min_length[3]|is_unique[users.user_name]',
                        'errors' => [
                            'required' => 'Veuillez saisir le Username',
                            'is_unique'=>"Un utilisateur avec cet nom d'utilisateur existe deja",
                            'min_length'=>"Le nom d'utilisateur doit contenir plus de 3 lettres",
                        ],
                    ],
                    'email' => [
                        'label'  => "Veuillez saisir l'adresse email",
                        'rules'  => 'valid_email|required|is_unique[users.user_email]',
                        'errors' => [
                            'valid_email' => 'Veuillez entrer une adresse email valide',
                            'required' => 'Veuillez saisir le mail',
                            'is_unique' => 'Un utilisateur avec cette adresse mail existe deja',
                        ],
                    ],
                    'password' => [
                        'label'  => "Veuillez saisir le Mot de Passe",
                        'rules'  => 'required|min_length[5]|max_length[10]',
                        'errors' => [
                            'required' => 'Veuillez saisir le mot de passe',
                            'min_length' => 'Le mot de passe doit contenir plus de 4 caracteres',
                            'max_length' => 'Le mot de passe doit contenir moins de 10 caracteres',
                        ],
                    ],
                );
                
                if( $this->validate($validation_rules) === false )
                {
                    $method = $this->request->getMethod();
                    switch( $method ){
                        case 'post':
                            echo view('backend/layout/add_admin_view', array('validation' => $this->validator));
                            break;
                        case 'get':
                            $message = $this->session->getFlashdata('special_message');
                            echo view('backend/layout/add_admin_view', array('special_message' => $message));
                            break;
                        default:
                            die('something is wrong here');
                    }
                    return;
                }

                $user_email= $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
                $user_name = $this->request->getPost('Username',FILTER_SANITIZE_STRING);
                $user_pwd = $this->request->getPost('password');
                $form_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);

            $data = [
                'user_name'=>$user_name,
                'user_password'=>$form_pwd,
                'user_email'=>$user_email,
            ];
          
            $admin_manager = new User(); 

            $user_details = $admin_manager->insert_in_db($data);

            if($user_details)
            {
                $this->session->setFlashdata('success_message', "L'ajout de l'utilisateur a bien été pris en compte");
                echo view('backend/layout/add_admin_view');

                $email = \Config\Services::email();

                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($user_email);   
                $token = bin2hex(random_bytes(30));

                $data = [
                    
                    'token' => $token,
                ];

                $message = view('email_template/admin_account_activation', $data);
                $email->setSubject('Activation de compte');  
                $email->setMessage($message);
                
                if($email->send()){

                    $admin_manager->account_activation($token, $user_email);
                    return;
                }
                else{

                    return;
                }
            }
            else {
                $this->session->setFlashdata('error_message', "L'ajout de l'utilisateur n'a pas été éffecuté. Merci de reésayer.");
                echo view('backend/layout/add_admin_view');
            }
        }
        
    }

    public function list_admin()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else{
            $admin_list = new User();
            $data['list_admin'] = $admin_list->list_admin();

            $action = $this->request->getPost('action');
            
            
            if($action === 'desactivate')
            {
                $user_id = $this->request->getPost('user_id');
                $desactivate = $admin_list->desactivate_user($user_id);
                if (!empty($desactivate)) {
                    $this->session->setFlashdata('success_message', "Le compte à été désactivé avec succès");
                    return redirect()->to(base_url('common/dashboard/list_admin'));
                }else{
                    $this->session->setFlashdata('error_message', "ERREUR, Merci de reessayer");
                }
            }
            elseif($action === 'activate')
            {
                $user_id = $this->request->getPost('user_id');
                $activate = $admin_list->activate_user($user_id);
                if (!empty($activate)) {

                    $this->session->setFlashdata('success_message', "Le compte à été activé avec succès");
                    return redirect()->to(base_url('common/dashboard/list_admin'));
                }else{
                    $this->session->setFlashdata('error_message', "ERREUR, Merci de reessayer");
                }
            }

            elseif($action === 'delete')
            {
                $user_id = $this->request->getPost('user_id');
                $delete = $admin_list->delete_user($user_id);
                if (!empty($delete)) {
                    
                    $this->session->setFlashdata('success_message', "Le compte à été supprimé avec succès");
                    return redirect()->to(base_url('common/dashboard/list_admin'));
                }
                else{
                    $this->session->setFlashdata('error_message', "ERREUR, Merci de reessayer");
                }
            }
            
            return view('backend/layout/list_admin',$data);
        }
        
    }

    public function add_categories()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
           
        }else {
            $category_infos = new Category();
            $data['list_category'] = $category_infos->list_categories();
            $validation_rules = array(
                'categorie_name' => [
                    'label'  => 'Veuillez saisir le nom de la categorie',
                    'rules'  => 'required|is_unique[categories.nom_categories]|min_length[3]',
                    'errors' => [
                        'required' =>  'Veuillez saisir le nom de la categorie',
                        'is_unique' =>  'Une categorie avec ce  nom existe déja',
                        'min_length' => 'Le nom de la categorie ne doit pas contenir moins de 3 caracteres',
                    ],
                ],
            );

            if ($this->validate($validation_rules) === false) {
                $method = $this->request->getMethod();
                switch ($method) {
                    case 'post':
                        $data['validation'] = $this->validator;
                        echo view('backend/layout/categories', $data);
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('backend/layout/categories',$data, array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }

            $categorie_name = $this->request->getPost('categorie_name');

            $data = [];

            if (!empty($categorie_name)) {
                $data['nom_categories'] = $categorie_name;
            }

            if(empty($categorie_name)) {
                $this->session->setFlashdata('error_message', 'Merci de saisir le nom de la categorie');
                return redirect()->to(base_url('common/dashboard/add_categories'));
            }
            $add_categorie = $category_infos->insert_in_db( $data);
            
            if ($add_categorie) {
                $this->session->setFlashdata('success_message', 'Categorie ajoutée avec succès.');
                return redirect()->to(base_url('common/dashboard/add_categories'));
                
            } else {
                $this->session->setFlashdata('error_message', 'Une erreur est survenue. Merci de reésayer');
                return redirect()->to(base_url('common/dashboard/add_categories'));
            }

        }
    }

    public function update_categories()
    {

        $category_infos = new Category();
        $data['list_category'] = $category_infos->list_categories();
       
        $action = $this->request->getPost('action');
        $categorie_name = $this->request->getPost('categorie_name');
        if($action === 'edit')
            {
                $id_categories = $this->request->getPost('id_categories');
                if (!empty($categorie_name)) {
                    $edit = $category_infos->edit_category($id_categories, $categorie_name);
                    if (!empty($edit)) {

                        $this->session->setFlashdata('success_message', "Le nom de la catégorie à été édité avec succès");
                        return redirect()->to(base_url('common/dashboard/add_categories'));
                    } else {
                        $this->session->setFlashdata('error_message', "ERREUR, Merci de reessayer");
                    }
                }else{
                    $this->session->setFlashdata('error_message', "Veuillez saisir le nom de la catégorie.");
                    return redirect()->to(base_url('common/dashboard/add_categories'));
                }
            }
            elseif($action === 'delete')
            {
                $id_categories = $this->request->getPost('id_categories');
                $delete = $category_infos->delete_category($id_categories);
                if (!empty($delete)) {

                    $this->session->setFlashdata('success_message', "La catégorie à été supprimé avec succès");
                    return redirect()->to(base_url('common/dashboard/add_categories'));
                }else{
                    $this->session->setFlashdata('error_message', "ERREUR, Merci de reessayer");
                }
            }
    }

    public function add_product()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else
            {
                $category_infos = new Category();
                $data['categories'] = $category_infos->list_categories();
                $validation_rules = array(
                    'article_name' => [
                        'label'  => "Veuillez saisir le nom de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez saisir le nom de l'article",
                        ],
                    ],
                    'article_description' => [
                        'label'  => "Veuillez saisir la description de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez saisir la description de l'article",
                        ],
                    ],
                    'article_taille' => [
                        'label'  => "Veuillez saisir les differentes tailles disponible pour l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez saisir les differentes tailles disponible pour l'article",
                        ],
                    ],

                    'category' => [
                        'label'  => "Veuillez Choisir la categorie",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'Veuillez Choisir la categorie',
                        ],
                    ],
                    'article_color' => [
                        'label'  => "Veuillez Choisir les différentes couleurs de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez Choisir les différentes couleurs de l'article",
                        ],
                    ],
                    'article_secondary_color' => [
                        'label'  => "Veuillez Choisir les différentes couleurs de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez Choisir les différentes couleurs de l'article",
                        ],
                    ],
                    'quantité' => [
                        'label'  => "Veuillez Choisir la quantité de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez Choisir la quantité de l'article",
                        ],
                    ],
                    'article_price' => [
                        'label'  => "Veuillez Choisir le prix de vente  de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez Choisir le prix de l'article",
                        ],
                    ],
                    'article_price_achat' => [
                        'label'  => "Veuillez Choisir le prix d'achat de l'article",
                        'rules'  => 'required',
                        'errors' => [
                            'required' => "Veuillez Choisir le prix de l'article",
                        ],
                    ],
                    'article_image' => [
                        'uploaded[article_image]',
                        'mime_in[article_image,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[article_image,1024]'
                    ],
                );
                
                if ($this->validate($validation_rules) === false) {
                    $method = $this->request->getMethod();
                    switch ($method) {
                        case 'post':
                            $data['validation'] = $this->validator;
                            echo view('backend/layout/add_product', $data);
                            break;
                        case 'get':
                            $message = $this->session->getFlashdata('special_message');
                            echo view('backend/layout/add_product',$data, array('special_message' => $message));
                            break;
                        default:
                            die('something is wrong here');
                    }
                    return;
                }

                $article_name= $this->request->getPost('article_name',FILTER_SANITIZE_STRING);
                $article_description = $this->request->getPost('article_description',FILTER_SANITIZE_STRING);
                $article_taille = $this->request->getPost('article_taille');
                $category= $this->request->getPost('category',FILTER_SANITIZE_STRING);
                $article_color= $this->request->getPost('article_color',FILTER_SANITIZE_STRING);
                $article_secondary_color= $this->request->getPost('article_secondary_color',FILTER_SANITIZE_STRING);
                $quantity= $this->request->getPost('quantité',FILTER_SANITIZE_STRING);
                $article_price= $this->request->getPost('article_price',FILTER_SANITIZE_STRING);
                $article_price_achat= $this->request->getPost('article_price_achat',FILTER_SANITIZE_STRING);
                $article_image = $this->request->getFile('article_image');
                
            
           $newName = $article_image->getRandomName();
            $article_image->move('./uploads', $newName);
            $url = base_url().'uploads'.'/'.$newName;
            
                $data = [
                    'product_name'=>$article_name,
                    'product_description'=>$article_description,
                    'taille_product'=>$article_taille,
                    'id_category'=>$category,
                    'product_color'=>$article_color,
                    'product_secondary_color'=>$article_secondary_color,
                    'product_quantity'=>$quantity,
                    'product_price'=>$article_price,
                    'product_image'=>$url,
                    'product_achat'=>$article_price_achat,
                ];
                
                
                $products_manager = new Products();
                $insert_product = $products_manager->insert_product($data);

                if($insert_product)
                {
                    $this->session->setFlashdata('success_message', "L'ajout de l'article a bien été pris en compte");
                    return redirect()->to(base_url('common/dashboard/add_product'));
                    
                }
                else {
                    $this->session->setFlashdata('error_message', "L'ajout de l'article n'a pas été éffecuté. Merci de reésayer.");
                    return redirect()->to(base_url('common/dashboard/add_product'));
                }
            }
        
    }

    public function search_result()
    {
        $order_search = new Orders();
        $keyword = $this->request->getPost('search');
       

        $data['orders']= $order_search->search($keyword);
        var_dump($data);
        //return view('backend/layout/search_result',$data);
    }

    public function message()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else{
            $message_list = new Contactus();
            $pager = \Config\Services::pager();

            $data = [
                'message' => $message_list->orderBy('id_contact_us', 'desc')->paginate(10, 'message'),
                'pager' => $message_list->pager,
            ];
            
            return view('backend/layout/messages',$data);      
        }   
       
    }

    public function list_customers()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else{
            $pager = \Config\Services::pager();
            $customers_list = new Customer();
            //$data['list_customers'] = $customers_list->list_customers();

           
           
        
            $data = [
                'customers' => $customers_list->orderBy('customers_id', 'desc')->paginate(10, 'customers'),
                'pager' => $customers_list->pager,
            ];
            
            return view('backend/layout/list_customers',$data);       
        }    
                    
    }

    public function list_product()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message)); 
        }else{

            $pager = \Config\Services::pager();
            $product_list = new Products();
        
            $data = [
                'orders' => $product_list->orderBy('id_product', 'desc')->paginate(8, 'orders'),
                'pager' => $product_list->pager,
            ];
            
            return view('backend/layout/list_product',$data);       
        }    
                    
    }

    /*public function add_orders()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
        } 
        else {

            $product_list = new Products();
            $data['articles'] = $product_list->list_product();

            $validation_rules = array(
                'product_name' => [
                    'label'  => 'Choisir l\'Article',
                    'rules'  => 'required',
                    'errors' => [
                        'required' =>  'Merci de selectionner l\'Article à ajouter à la commande',
                    ],
                ],

                'product_quantity' => [
                    'label'  => 'Veuillez saisir la quantité',
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' =>  'Veuillez saisir la quantitée de l\'article',
                        'numeric' =>  'Merci de saisir un chiffre',
                    ],
                ],
            );

            if ($this->validate($validation_rules) === false) {
                $method = $this->request->getMethod();
                switch ($method) {
                    case 'post':
                        $data['validation'] = $this->validator;
                        echo view('backend/layout/add_orders', $data);
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('backend/layout/add_orders', $data, array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }


            // $orders = $this->request->getPost('orders');
            $product_name = $this->request->getPost('product_name');
            $product_quantity = $this->request->getPost('product_quantity');

            $data['orders_data'] = [
                'product_name' => $product_name,
                'product_quantity' => $product_quantity,
                //'product'  => $orders
            ];
            //var_dump($data);
            return view('backend/layout/add_orders', $data);
        }
    }  */

    public function add_profil_pic()
    {
        if (!session('logged_in') ) {
            $message = "<div class='alert alert-danger text-center' role='alert'>Veuillez vous identifier !</div>";
            echo view('backend/layout/login', array('special_message' => $message));
        } else {
            $validation_rules = array(
                'file' => [
                    'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[file,1024]',
                    'errors' => [
                        'uploaded' => "Le format d'image n'est pas pris en charge"
                    ],
                ],
            );

            if ($this->validate($validation_rules) === false) {
                $method = $this->request->getMethod();
                switch ($method) {
                    case 'post':
                        $data['validation'] = $this->validator;
                        echo view('backend/layout/modals/add_profil_pic', $data);
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('backend/layout/modals/add_profil_pic', $data, array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }

            $user_manager = new User();
            $profil_image = $this->request->getFile('file');

            $data = [];

            $newName = $profil_image->getRandomName();
                $profil_image->move('./uploads', $newName);
                $url = base_url().'uploads'.'/'.$newName;

            if (!empty($url)) {
                $data['profil_image'] = $url;
            }
            $add_pic = $user_manager->update_data( session('user_id'),$data);
            
            if ($add_pic) {
                session()->setFlashdata('success_message', 'Photo de profil ajoutée avec succès.');
                session()->set('user_pic',$url);
                return redirect()->to(base_url('common/dashboard/profil'));
                
            } else {
                session()->setFlashdata('error_message', 'Une erreur est survenue. Merci de reésayer');
                return redirect()->to(base_url('common/dashboard/profil'));
            }
        }
    }
}
