<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id_product';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_product,product_name'];

    public function insert_product($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('products');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_articles_data($id, $data)
    {
        $builder = $this->db->table('products');
        $builder->where('id_product', $id);

        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $builder->set($key, $value);
            }
        }
        
        $builder->update();

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
