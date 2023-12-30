<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Products;

class LandingPage extends BaseController
{

    public function __construct()
    {
        helper('number');
        helper('form');
    }
    public function index()
    {
        $category_infos = new Category();
        $data['list_category'] = $category_infos->list_categories();
        $product_list = new Products();

        return view('frontend/layout/landing', $data);
    }

    public function contactus()
    {
        $validation_rules = array(
            'username' => [
                'label'  => "Veuillez saisir votre nom et prenom",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom et prenom",
                ],
            ],
            'number' => [
                'label'  => "Veuillez saisir votre numero",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre numero",
                ],
            ],
            'email' => [
                'label'  => "Veuillez saisir votre email",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre email",
                ],
            ],

            'object' => [
                'label'  => "Veuillez saisir l'objet de votre message",
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Veuillez Choisir la categorie',
                ],
            ],
            'message' => [
                'label'  => "Veuillez saisir votre message",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre message",
                ],
            ],
        );
        
        if( $this->validate($validation_rules) === false )
        {
            $method = $this->request->getMethod();
            switch( $method ){
                case 'post':
                    echo view('frontend/layout/contactus', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = session()->getFlashdata('special_message');
                    echo view('frontend/layout/contactus', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }


        $name= $this->request->getPost('username',FILTER_SANITIZE_STRING);
        $number = $this->request->getPost('number',FILTER_SANITIZE_STRING);
        $email = $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
        $object= $this->request->getPost('object',FILTER_SANITIZE_STRING);
        $user_message= $this->request->getPost('message',FILTER_SANITIZE_STRING);
        
        
        $data = [
            'name'=>$name,
            'number'=>$number,
            'email'=>$email,
            'object'=>$object,
            'message'=>$user_message,
        ];

        $contactus_manager = new Customer();
        $user_message= $contactus_manager->insert_contact_us($data);
        if(empty($user_message)){
                $message = "<div class='alert alert-danger' role='alert'></div>";
                echo view('frontend/layout/contactus', array('error_message' => $message));
                return;
        }
        else{
                $message = "<div class='alert alert-success' role='alert'></div>";
                echo view('frontend/layout/contactus', array('special_message' => $message));
                return;
        }

    }

    public function products()
    {
        $pager = \Config\Services::pager();
        $category_infos = new Category();
        $product_list = new Products();
        
        $data = [
            'orders' => $product_list->orderBy('created_at', 'desc')->paginate(12, 'orders'),
            'pager' => $product_list->pager,
        ];

        $data['list_category'] = $category_infos->list_categories();

        return view('frontend/layout/products', $data);
    }
    
    public function get_details($id =null)
    {
        $product_manager = new Products();
        
        if(isset($id) && $id != NULL){
            $product = $product_manager->where('product_name', $id)->first();
            $item = array(
                'id' => $product['id_product'],
                'name' => $product['product_name'],
                'price' => $product['product_price'],
                'image' => $product['product_image'],
                'description' => $product['product_description'],
                'stock_quantity' => $product['product_quantity'],
                'color' => $product['product_color'],
                'taille' => $product['taille_product'],
                'secondary_color' => $product['product_secondary_color'],
                'quantity' => 1,
            );
            $similaire = $product_manager->asObject()->where('id_category',$product['id_category'])->findAll();
            $data = [
                'item'=> $item,
                'similaire'=> $similaire
            ];
            
            return view('frontend/layout/product_details',$data);
        }
        return redirect()->to(base_url('common/landingpage/products'));
    }

    public function display_by_cat($id)
    {
        $pager = \Config\Services::pager();
        $product_manager = new Products();
        $category_infos = new Category();
        $product_list = new Products();
        
        $data = [
            'orders' => $product_list->orderBy('created_at', 'desc')->paginate(12, 'orders'),
            'pager' => $product_list->pager,
        ];
        $data['products'] = $product_manager->asObject()->where('id_category',$id)->findAll();
        
        $data['list_category'] = $category_infos->list_categories();

        return view('frontend/layout/display_by_category',$data);
    }


}
