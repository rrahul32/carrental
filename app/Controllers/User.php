<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use App\Models\CustomerModel;

class User extends BaseController
{
    public function login()
    {
        if(session()->get('isLoggedIn'))
        return redirect()->to(session()->get('type').'/dashboard');

        helper('form');
        $data=[
            'page_title'=>'Login',
            'page'=>'login',
        ];
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'email'=>[
                    'rules'=>'required|valid_email',
                    'label' => 'Email Address'
                ],
                'password'=>[
                    'rules'=>'required|min_length[8]|max_length[255]|validateUser[email,password,type]',
                    'label'=>'Password'
                ],
                'type'=> [
                    'rules'=>'in_list[customer, agency]',
                    'errors' => [
                        'in_list'=> 'User type should be either Customer or Agency.'
                    ]
                ],
            ];

            if(! $this->validate($rules))
            $data['validation'] = $this->validator;
            else
            {
                if($this->request->getVar('type')=='agency')
                {
                    $model = new AgencyModel();
                }
                else if($this->request->getVar('type')=='customer')
                {
                    $model = new CustomerModel();
                }
                
                $user= $model->where('email',$this->request->getVar('email'))->first();
                $this->setUserSession($user,$this->request->getVar('type'));

                return redirect()->to($this->request->getVar('type').'/dashboard');
                // echo $this->request->getVar('type');
                // exit();
            }
        }

        return view('pages/login',$data);
    }

    private function setUserSession($user,$type){
        if($type=='customer')
        {
            $data['fname']=$user['fname'];
            $data['lname']=$user['lname'];
        }
        else if($type=='agency')
        $data['name']=$user['name'];
        $data=[
            'id'=>$user['id'],
            'email'=>$user['email'],
            'type'=>$type,
            'isLoggedIn'=>true,
        ];
        session()->set($data);
        return true;
    }

    public function logout(){
        $type=session()->get('type');
        session()->destroy();
        return redirect()->to($type.'/login');
    }

}
