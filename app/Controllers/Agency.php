<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use App\Models\CarModel;

class Agency extends BaseController
{
    public function addCar()
    {
        helper('form');
        $data=[
            'page_title'=>'Add Car',
            'page'=>'add car'
        ];

        if($this->request->getMethod()=='post')
        {
            $rules = [
                'model'=>[
                    'rules'=> 'required|min_length[3]|max_length[30]',
                    'label'=> 'Model'
                ],
                'number'=>[
                    'rules'=>'required|regex_match[/^[A-Z]{2}[0-9]{2}[A-Z]{1}[0-9]{1,4}/]|is_unique[cars.number]',
                    'label' => 'Number',
                    'errors' => [
                        'regex_match'=>'The Number field should be in the format: AB01C2345 '
                    ]
                ],
                'capacity'=>[
                    'rules'=>'required|integer|in_list[2,3,4,5,6,7,8,9]',
                    'label'=>'Seating Capacity'
                ],
                'rate'=>[
                    'rules'=> 'required|greater_than[10]|less_than[100000]|regex_match[/\d+(\.[0-9]{1,2}){0,1}/]',
                    'lable'=>'Rate Per Day',
                    'errors'=> [
                        'regex_match'=> 'Maximum two decimal places in Rate Per Day field.'
                    ]
                    ]
            ];

            if(! $this->validate($rules))
            $data['validation'] = $this->validator;
            else
            {
                $model = new CarModel();
                $userData = [
                    'model' => $this->request->getVar('model'),
                    'number' => $this->request->getVar('number'),
                    'capacity' => $this->request->getVar('capacity'),
                    'rate' => $this->request->getVar('rate'),
                    'agency_id' => $_SESSION['id']
                ];

                $model->save($userData);
                $session = session();
                $session->setFlashdata('car_added', true);
            }
        }

        return view('pages/users/agency/addcar',$data);
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
            'page_title'=>'Agency Signup',
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
