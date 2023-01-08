<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['fname', 'lname', 'email', 'password', 'type', 'updated_at'];
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