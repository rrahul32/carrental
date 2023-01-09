<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        $cities = db_connect()->table('rental_cities')->select('city')->get()->getResultArray();
        $city_list = [];
        foreach ($cities as $city) {
            $city_list[] = $city['city'];
        }

        $data = [
            'page_title' => 'Home',
            'page' => 'home',
            'cities' => $city_list,
        ];

        if (session()->get('isLoggedIn'))
            $data['layout'] = session()->get('type');
        else
            $data['layout'] = 'nologin';

        if (isset($_GET['search'])) {
            $rules = [
                'city' => [
                    'rules' => 'required|in_list[' . implode(",", $city_list) . ']',
                    'lablel' => 'City',
                    'errors' => [
                        'in_list' => 'Please select a city from the list'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                if (isset($_GET['searchResults']))
                    return view('pages/searchResults', $data);
            } else {
                $carQuery = isset($_GET['car']) ? "AND `model` LIKE '$_GET[car]'" : '';
                $cars = db_connect()->query("SELECT `model`,`capacity`, `rent_per_day` FROM `cars` WHERE `agency_id` IN (SELECT `id` FROM `agencies` WHERE `city`='$_GET[city]')$carQuery")->getResultArray();
                $data['cars'] = $cars;
                return view('pages/searchResults', $data);
            }
        }
        return view('pages/home', $data);
    }
}
