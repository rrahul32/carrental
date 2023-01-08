<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function dashboard()
    {
        $data=[
            'page_title'=>'Customer Dashboard',
            'page'=>'dashboard'
        ];

        return view('pages/users/customer/dashboard',$data);
    }

    public function signup()
    {
        if(session()->get('isLoggedIn'))
        return redirect()->to(session()->get('type').'/dashboard');

        helper('form');
        $data=[
            'page_title'=>'Signup',
            'page'=>'signup',
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
                    'rules'=>'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
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
                //$model = new UseModel();
                $userData = [
                    'fname' => $this->request->getVar('fname'),
                    'lname' => $this->request->getVar('lname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'type' => $this->request->getVar('type'),
                ];

                $model->save($userData);
                $session = session();
                $session->setFlashdata('reg_success', true);

                return redirect()->to('/login');
            }
        }


        return view('pages/signup',$data);
    }
}
