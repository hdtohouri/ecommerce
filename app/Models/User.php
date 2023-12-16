<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['user_name', 'user_password'];


    public function get_permissions($user_name, $password)
    {
        $builder = $this->db->table('users');
        $builder->select('user_id,user_name,full_name,user_password,user_email,can_add_admin,account_status,profil_image');
        $builder->where('user_name', $user_name);
        $result = $builder->get();
        $user_details = $result->getRowArray();

        if (count($result->getResultArray()) == 1 && password_verify($password, $user_details['user_password'])) {
            return  ['user_details' => $user_details];
        }
    }

    public function verifyEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select('user_id,user_name,full_name,account_status');
        $builder->where('user_email', $email);
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
        $builder = $this->db->table('users');
        $builder->where('user_id', $id);
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
        $builder = $this->db->table('users');
        $builder->select('user_id, user_name, reset_password_token_created_at');
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
        $builder = $this->db->table('users');
        $builder->where('reset_password_token', $token);
        $builder->update(['user_password' => password_hash($password, PASSWORD_DEFAULT), 'password_modification_flag' => 'YES']);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($id, $data)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $id);

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

    public function insert_in_db($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function account_activation($activation_token,$email){
        $builder = $this ->db->table('users');
        $builder->where('user_email', $email);
        $now = new Time('now');
        $formattedDate = $now->format('Y-m-d H:i:s');
        $builder->update(['reset_password_token'=> $activation_token,'reset_password_token_created_at'=> $formattedDate ]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function validate_AccountActivation($token)
    {
        $builder = $this->db->table('users');
        $builder->where('reset_password_token', $token);
        $builder->where('account_status', 'INACTIVE');
        $builder->update(['account_status' => 'ACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function list_admin()
    {
        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->select('user_id,full_name,account_status,is_online,');
        $builder->orderBy('user_id', 'DESC');
        return $this->findAll();
    }

    public function activate_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->where('account_status', 'DESACTIVE'); 
        $builder->update(['account_status' => 'ACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function desactivate_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->where('account_status', 'ACTIVE'); 
        $builder->update(['account_status' => 'DESACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function search($user_name){

        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('user_name', $user_name);
        $builder->orderBy('user_id', 'DESC');
        $result = $builder->get();
        $user_details = $result->getRowArray();
        return  ['user_details' => $user_details];
    }
    
}
