<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[
            'page_title'=>'Home',
            'page'=>'home'
        ];

        return view('pages/home',$data);
    }
}