<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Products;

class Favoris extends BaseController
{
    public function index()
    {
        if (session()->has('favoris')) {
            $data['items'] = array_values(session('favoris'));
        } else {
            $data['items'] = []; 
        }
        return view('frontend/layout/favoris', $data);
    }

    public function add_favoris($id)
    {
        //$data['items'] = array_values(session('cart'));
        $favoris_manager = new Products();
        $product = $favoris_manager->find($id);

        $item = array(
            'id' => $product['id_product'],
            'name' => $product['product_name'],
            'price' => $product['product_price'],
            'image' => $product['product_image'],
            'quantity' => 1,
        );

        if (session()->has('favoris')) {
            $index = $this->exists($id);
            $favoris = array_values(session('favoris'));
            if ($index == -1) {
                array_push($favoris, $item);
            } else {
                $favoris[$index]['quantity']++;
            }
            session()->set('favoris', $favoris);
        } else {
            $favoris = array($item);
            session()->set('favoris', $favoris);
        }

        return $this->response->redirect(site_url('common/favoris'));
        //return view('frontend/layout/favoris',$item);
    }

    private function exists($id)
    {
        $items = array_values(session('favoris'));
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $favoris = array_values(session('favoris'));
        unset($favoris[$index]);
        session()->set('favoris', $favoris);
        return $this->response->redirect(site_url('common/favoris'));
    }

}
