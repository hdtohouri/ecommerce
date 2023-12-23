<?php

namespace App\Models;

use CodeIgniter\Model;

class Contactus extends Model
{
    protected $table            = 'contact_us';
    protected $primaryKey       = 'id_contact_us';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_contact_us,read_message'];


    public function read_message($id)
    {
        $builder = $this->db->table('contact_us');
        $builder->where('id_contact_us', $id);
        $builder->where('read_message', 'NO');
        $builder->update(['read_message' => 'YES']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
