<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model{
    protected $table = 'customers';
    protected $allowedFields = ['fname', 'lname', 'email', 'password', 'city'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        $data['data']['password']=$this->passHash($data['data']['password']);
        return $data;
    }
    
    protected function beforeUpdate(array $data){
        $data['data']['password']=$this->passHash($data['data']['password']);
        return $data;
    }

    protected function passHash($pass){
        $pass=password_hash($pass,PASSWORD_DEFAULT);
        return $pass;
    }



}

?>