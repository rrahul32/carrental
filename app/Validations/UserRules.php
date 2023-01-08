<?php
namespace App\Validations;
use App\Models\UserModel;

class UserRules{
    public function  validateUser(string $str,string $fields, array $data, ?string &$error = null): bool
    {
        $model = new UserModel();
        $user = $model->where(['email'=>$data['email'], 'type'=>$data['type']])->first();
        if(!$user)
        {
            $error = "Please signup first!";
            return false;
        }
        if(!password_verify($data['password'],$user['password']))
        {
            $error = "Incorrect password!";
            return false;
        }
        return true;

    }
}


?>