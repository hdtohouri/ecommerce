<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id_categories';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_categories,nom_categories'];

    public function insert_in_db($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('categories');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function list_categories()
    {
        $builder = $this->builder();
        $builder = $this->db->table('categories');
        $builder->select('id_categories,nom_categories,created_at,categories_image');
        $builder->orderBy('id_categories', 'DESC');
        return $this->findAll();
    }

    public function edit_category($id_categories,$data)
    {
        $builder = $this->db->table('categories');
        $builder->where('id_categories', $id_categories);
        $builder->update(['nom_categories' => $data]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_category($id_categories)
    {
        $builder = $this->db->table('categories');
        $builder->where('id_categories', $id_categories);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    
}
