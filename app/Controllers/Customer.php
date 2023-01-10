<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function profile()
    {
        if(session()->get('type')!='customer')
        return redirect()->to('/');
        $model = new CustomerModel();
        $profile = $model->where('id',session()->get('id'))->first();
        $data=[
            'page_title'=>'Profile',
            'page'=>'profile',
            'profile'=>$profile
        ];
        return view('pages/users/customer/profile',$data);
    }

    public function signup()
    {
        if(session()->get('isLoggedIn'))
        return redirect()->to(session()->get('type').'/dashboard');

        helper('form');
        $cities= db_connect()->table('rental_cities')->select('city')->get()->getResultArray();
        $city_list=[];
        foreach($cities as $city){
            $city_list[]=$city['city'];
        }
        $data=[
            'page_title'=>'Customer Signup',
            'page'=>'signup',
            'cities'=>$city_list,
        ];

        if($this->request->getMethod()=='post')
        {
            $rules = [
                'fname'=>[
                    'rules'=> 'required|min_length[3]|max_length[30]',
                    'label'=> 'First Name'
                ],
                'lname'=>[
                    'rules'=> 'required|min_length[3]|max_length[30]',
                    'label'=> 'Last Name'
                ],
                'email'=>[
                    'rules'=>'required|min_length[6]|max_length[50]|valid_email|is_unique[customers.email]',
                    'label' => 'Email Address'
                ],
                'password'=>[
                    'rules'=>'required|min_length[8]|max_length[255]',
                    'label'=>'Password'
                ],
                'cpassword'=>[
                    'rules'=> 'matches[password]',
                    'errors'=> [
                        'matches'=> 'Passwords do not match.'
                    ]
                ],
                'city'=> [
                    'rules'=>'in_list['.implode(",",$city_list).']',
                    'errors' => [
                        'in_list'=> 'Please select a city from the list'
                    ]
                ],
            ];

            if(! $this->validate($rules))
            $data['validation'] = $this->validator;
            else
            {
                $model = new CustomerModel();
                $userData = [
                    'fname' => $this->request->getVar('fname'),
                    'lname' => $this->request->getVar('lname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'city' => $this->request->getVar('city'),
                ];

                $model->save($userData);
                $session = session();
                $session->setFlashdata('reg_success', true);

                return redirect()->to('/login');
            }
        }


        return view('pages/users/customer/signup',$data);
    }
}
