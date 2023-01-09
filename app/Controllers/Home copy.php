<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        $cities= db_connect()->table('rental_cities')->select('city')->get()->getResultArray();
        $city_list=[];
        foreach($cities as $city){
            $city_list[]=$city['city'];
        }

        $data=[
            'page_title'=>'Home',
            'page'=>'home',
            'cities'=>$city_list,
        ];
        
        if(session()->get('isLoggedIn'))
        $data['layout']=session()->get('type');
        else
        $data['layout']='nologin';

        if(isset($_GET['search'])){
            $rules = [
                'city'=> [
                    'rules'=>'required|in_list['.implode(",",$city_list).']',
                    'lablel'=>'City',
                    'errors' => [
                        'in_list'=> 'Please select a city from the list'
                    ]
                ],
            ];

            if(session('type')=='agency'){
                $rules['days']=[
                    'rules'=>'integer|greater_than[0]|less_than_equal_to[30]',
                    'label'=>'No of Days'
                ];
                $rules['startDate']=[
                    'rules'=>'required|valid_date|validateStartDate',
                    'label'=>'Start Date'
                ];
            }

            if(! $this->validate($rules))
            $data['validation'] = $this->validator;
            // else
            // {
            //     $model = new AgencyModel();
            //     $userData = [
            //         'name' => $this->request->getVar('name'),
            //         'email' => $this->request->getVar('email'),
            //         'password' => $this->request->getVar('password'),
            //         'city' => $this->request->getVar('city'),
            //     ];

            //     $model->save($userData);
            //     $session = session();
            //     $session->setFlashdata('reg_success', true);

            //     return redirect()->to('/login');
            // }
        }
        return view('pages/home',$data);
    }
}
