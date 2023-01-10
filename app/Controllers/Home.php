<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\RentalModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Home',
            'page' => 'home',
        ];

        if (session()->get('isLoggedIn'))
            $data['layout'] = session()->get('type');
        else
            $data['layout'] = 'nologin';

        if ($this->request->getMethod() == 'post') {
            if (session()->get('type') == 'agency')
                return redirect()->to('/');
            else if (session()->get('type') == 'customer') {
                helper('form');
                $days=[];
                for($i=1;$i<30;$i++)
                {
                    $days[]=$i;
                }
                if(isset($_POST['checkavailable']))
                {
                    $rules = [
                        'startdate' => [
                            'rules' => 'required|valid_date|validateStartDate',
                            'label' => 'From'
                        ],
                        'days' => [
                            'rules' => 'required|in_list['.implode(',',$days).']',
                            'label' => 'No of Days'
                        ],
                    ];
                    if (!$this->validate($rules))
                        $data['validation'] = $this->validator;
                        else {
                            $model = new CarModel();
                            $carsFilter = $model->where("`id` NOT IN (SELECT `car_id` FROM `rentals` WHERE DATEDIFF('" . $_POST['startdate'] . "',`from_date`)<=`no_of_days`)");
                            $cars = $carsFilter->findAll();
                            $data['cars'] = $cars;
                            session()->setFlashdata('availabilityChecked',true);              
                            session()->setFlashdata('POST_DATA',$_POST);                  
                            return view('pages/home', $data);
                        }
                }
                else
                {
                    $carIds=[];
                    foreach(db_connect()->query("SELECT `id` FROM `cars` WHERE `id` NOT IN (SELECT `car_id` FROM `rentals` WHERE DATEDIFF('".session()->get('POST_DATA')['startdate']."',`from_date`)<=`no_of_days`)")->getResultArray() as $id)
                    $carIds[]=$id['id'];
                    $rules=[
                        'startdate' => [
                            'rules' => 'required|valid_date|validateStartDate',
                            'label' => 'From'
                        ],
                        'days' => [
                            'rules' => 'required|in_list['.implode(',',$days).']',
                            'label' => 'No of Days'
                        ],
                        'carid'=>[
                            'rules' => 'required|in_list['.implode(',',$carIds).']',
                            ]
                        ];
                        
                        if (!$this->validate($rules))
                        $data['validation'] = $this->validator;
                        else {

                            $rentalData = [
                                'car_id'=> $this->request->getVar('carid'),
                                'customer_id'=> session()->get('id'),
                                'no_of_days'=> $this->request->getVar('days'),
                                'from_date'=> $this->request->getVar('startdate'),
                            ];
                            $rate_per_day=db_connect()->query('SELECT rent_per_day FROM cars WHERE id='.$rentalData['car_id'].'')->getRowArray()['rent_per_day'];
                            $rent=((float)$rate_per_day) * ((int)$rentalData['no_of_days']);
                            $rentalData['rent']=$rent;
                            $model=new RentalModel();
                            $model->save($rentalData);
                            session()->setFlashdata('Booked',true);
                            return redirect()->to('/');
                        }
                    }
            } 
            else{
                session()->setFlashdata('message','Please login as Customer to rent car.');
                return redirect()->to('login/');
            }
        }
        $model = new CarModel();
        $cars = $model->findAll();
        $data['cars'] = $cars;
        return view('pages/home', $data);
    }
}
