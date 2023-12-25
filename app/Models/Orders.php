<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'order_number';
    protected $returnType       = 'array';
    protected $allowedFields    = ['order_satut, order_total, order_number'];

    public function search($keyword){

        $builder = $this->builder();
        $builder = $this->db->table('orders');
        $builder->select('order_date,order_number');
        $builder->like('order_number', $keyword);
        $result = $builder->get();
        $user_details = $result->getRowArray();
        return  $user_details;
    }

    public function insert_data($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('orders');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function insert_user_data($user_data)
    {
        $builder = $this->db->table('order_infos');

        foreach ($user_data as $key => $value) {
            if (!empty($value)) {
                $builder->set($key, $value);
            }
        }
        
        $builder->insert();

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_cart_data($cart)
    {
        $builder = $this->db->table('cart');
        $builder->insert($cart);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function validate_order($order_number)
    {
        $builder = $this->db->table('orders');
        $builder->where('order_number', $order_number);
        //$builder->where('order_statut', 'En Attente');
        $builder->update(['order_statut' => 'Commande Validée']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function refuse_order($order_number)
    {
        $builder = $this->db->table('orders');
        $builder->where('order_number', $order_number);
        //$builder->where('order_statut', 'En Attente');
        $builder->update(['order_statut' => 'Commande Annulée']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
