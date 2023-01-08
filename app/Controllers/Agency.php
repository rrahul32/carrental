<?php

namespace App\Controllers;

use App\Models\AgencyModel;

class Agency extends BaseController
{
    public function dashboard()
    {
        $data=[
            'page_title'=>'Agency dashboard',
            'page'=>'dashboard'
        ];

        return view('pages/users/agency/dashboard',$data);
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
            'page_title'=>'Signup',
            'page'=>'signup',
            'cities'=>$city_list,
        ];
        if($this->request->getMethod()=='post')
        {
            $rules = [
                'name'=>[
                    'rules'=> 'required|min_length[3]|max_length[30]',
                    'label'=> 'Name'
                ],
                'email'=>[
                    'rules'=>'required|min_length[6]|max_length[50]|valid_email|is_unique[agencies.email]',
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
                $model = new AgencyModel();
                $userData = [
                    'name' => $this->request->getVar('name'),
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


        return view('pages/users/agency/signup',$data);
    }
}
