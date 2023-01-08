<?php
namespace App\Validations;
use App\Models\AgencyModel;
use App\Models\CustomerModel;

class UserRules{
    public function  validateUser(string $str,string $fields, array $data, ?string &$error = null): bool
    {
        if($data['type']=='agency')
        $model = new AgencyModel();
        else if($data['type']=='customer')
        $model = new CustomerModel();

        $user = $model->where('email',$data['email'])->first();
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