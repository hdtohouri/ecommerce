<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Products;

class ShoppingCart extends BaseController
{

    public function index()
    {
        $data['items'] = array_values(session('cart'));
        $data['total'] = $this->total();
        return view('frontend/layout/shopping_cart', $data);
    }

    public function cart($id)
    {
        $product_manager = new Products();
        $product = $product_manager->find($id);

        $item = array(
            'id' => $product['id_product'],
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'image' => $product['product_image'],
            'quantity' => 1,
        );

        if (session()->has('cart')) {
            $index = $this->exists($id);
            $cart = array_values(session('cart'));
            if ($index == -1) {
                array_push($cart, $item);
            } else {
                $cart[$index]['quantity']++;
            }
            session()->set('cart', $cart);
            session()->set('total', $this->total() );
        } else {
            $cart = array($item);
            session()->set('cart', $cart);
            session()->set('total', $this->total() );
        }

        return $this->response->redirect(site_url('common/shoppingcart'));
    }

    private function exists($id)
    {
        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total()
    {
        $s = 0;
        $items = array_values(session('cart'));
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        session()->set('cart', $cart);
        return $this->response->redirect(site_url('common/shoppingcart'));
    }

    public function update()
    {
        $cart = array_values(session('cart'));

        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i]['quantity'] = $_POST['quantity'][$i];
        }
        session()->set('cart', $cart);
        return $this->response->redirect(site_url('common/shoppingcart'));
    }

    public function payment()
    {
        $data['items'] = array_values(session('cart'));
        $data['total'] = $this->total();
        $validation_rules = array(
            'name' => [
                'label'  => "Veuillez saisir votre nom",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom",
                ],
            ],
            'lastname' => [
                'label'  => "Veuillez saisir votre Prénom",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre Prénom",
                ],
            ],
            'number' => [
                'label'  => "Veuillez saisir votre Numero",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre Numero",
                ],
            ],

            'email' => [
                'label'  => "Veuillez saisir votre Adresse Email",
                'rules'  => 'permit_empty',
            ],
            'addresse' => [
                'label'  => "Veuillez saisir votre Addresse (Commune / Quartier)",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre Addresse",
                ],
            ],
            'mode_paiement' => [
                'label'  => "Veuillez Choisir une méthode de paiement",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez Choisir une méthode de paiement",
                ],
            ],
        );

        if ($this->validate($validation_rules) === false) {
            $method = $this->request->getMethod();
            switch ($method) {
                case 'post':
                    $data['validation'] = $this->validator;
                    echo view('frontend/layout/proceed_payment', $data);
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('frontend/layout/proceed_payment', $data, array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $customer_name = $this->request->getPost('name', FILTER_SANITIZE_STRING);
        $customer_lastname = $this->request->getPost('lastname', FILTER_SANITIZE_STRING);
        $customer_number = $this->request->getPost('number');
        $customer_email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $customer_adresse = $this->request->getPost('addresse', FILTER_SANITIZE_STRING);
        $mode_paiement = $this->request->getPost('mode_paiement');

        $order_number = rand(111111, 999999);
        $user_id = rand(111, 999);

        $order_manager = new Orders();

        
        $user_data = [];

        if (!empty($user_id)) {
            $user_data['order_infos_id'] = $user_id;
        }
        if (!empty($customer_name)) {
            $user_data['customer_name'] = $customer_name;
        }
        if (!empty($customer_number)) {
            $user_data['customer_number'] = $customer_number;
        }
        if (!empty($customer_email)) {
            $user_data['customer_email'] = $customer_email;
        }
        if (!empty($customer_adresse)) {
            $user_data['customer_adresse'] = $customer_adresse;
        }
        if (!empty($mode_paiement)) {
            $user_data['paiement_mode'] = $mode_paiement;
        }

        $user_data_inserted = $order_manager->insert_user_data($user_data);

        $order_data = [
            'order_number'=> $order_number,
            'order_total'=> session('total'),
            'user_id'=>$user_id,
        ];

        $order_data_inserted = $order_manager->insert_data($order_data);
        
        foreach ($data['items'] as $item) {
            $id = $item['id'];
            $price = $item['price'];
            $quantity = $item['quantity'];

            $insert_cart = $order_manager->insert_cart_data([
                'product_id' => $id,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'order_number'=> $order_number,
            ]);
        }   


      if($order_data_inserted && $insert_cart && $user_data_inserted)
        {
            $email = \Config\Services::email();

                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($customer_email);   
                $array = [
                    'user_data' => $user_data,
                    'order_data' => $order_data,
                    'data' => $data
                ];
                $message = view('email_template/send_order_details',$array);
                $email->setSubject('Commande Reçue');  
                $email->setMessage($message);
                
                if($email->send()){
                    return redirect()->to(base_url('common/shoppingcart/payment_success'));
                }
                else{
                    return;
                }
            
            
        }
        else{
            echo 'failed';
        }

    }

    public function payment_success()
    {

        $data = [
            'total',
            'cart',
        ];

        session()->remove($data);
        return view('frontend/layout/payment_success');
    }
}