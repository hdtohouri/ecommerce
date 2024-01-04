<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Customer extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'customers_id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['customers_id,customers_username'];

    public function insert_data($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('customers');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function get_customer_permissions($user_name, $password)
    {
        $builder = $this->db->table('customers');
        $builder->select('customers_id,customers_username,customers_password,customers_location,customers_account_status,customers_number');
        $builder->where('customers_username', $user_name);
        $result = $builder->get();
        $customers_details = $result->getRowArray();

        if (count($result->getResultArray()) == 1 && password_verify($password, $customers_details['customers_password'])) {
            return  ['customers_details' => $customers_details];
        }
    }

    public function insert_contact_us($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('contact_us');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function notification()
    {
        $builder = $this->builder();
        $builder = $this->db->table('contact_us');
        $builder->where('read_message', 'NO');
        $result = $builder->get();
        $count = $result->getNumRows();
        if($count> 0 )
        {
            return $count;
        }
        else{
            return false;
        }
    }

    public function activate_customer($customer_id)
    {
        $builder = $this->db->table('customers');
        $builder->where('customers_id', $customer_id);
        $builder->where('customers_account_status', 'DESACTIVE'); 
        $builder->update(['customers_account_status' => 'ACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function desactivate_customer($customer_id)
    {
        $builder = $this->db->table('customers');
        $builder->where('customers_id', $customer_id);
        $builder->where('customers_account_status', 'ACTIVE'); 
        $builder->update(['customers_account_status' => 'DESACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_customer($customer_id)
    {
        $builder = $this->db->table('customers');
        $builder->where('customers_id', $customer_id);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function verifyEmail($email)
    {
        $builder = $this->db->table('customers');
        $builder->select('customers_id ,customers_username,customers_account_status');
        $builder->where('customers_email', $email);
        $result = $builder->get();
        $row = $result->getRowArray();
        if (count($result->getResultArray()) == 1) {
            return ['row' => $row];
        } else {
            return false;
        }
    }

    public function update_email_token($token, $id)
    {
        $builder = $this->db->table('customers');
        $builder->where('customers_id', $id);
        $now = new Time('now');
        $formattedDate = $now->format('Y-m-d H:i:s');
        $builder->update(['reset_password_token' => $token, 'reset_password_token_created_at' => $formattedDate]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyToken($token)
    {
        $builder = $this->db->table('customers');
        $builder->select('customers_id, customers_username, reset_password_token_created_at');
        $builder->where('reset_password_token', $token);
        $result = $builder->get();
        $row = $result->getRowArray();
        if (count($result->getResultArray()) == 1) {
            return $row['reset_password_token_created_at'];
        } else {
            return false;
        }
    }

    public function checkExpireDate($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $time_diff = (($current_time - $update_time) / 60);
        if ($time_diff < 10) {
            return true;
        } else {
            return false;
        }
    }

    public function reset_user_password($token, $password)
    {
        $builder = $this->db->table('customers');
        $builder->where('reset_password_token', $token);
        $builder->update(['user_password' => password_hash($password, PASSWORD_DEFAULT), 'password_modification_flag' => 'YES']);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }



}
