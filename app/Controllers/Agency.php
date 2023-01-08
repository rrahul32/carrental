<?php

namespace App\Controllers;

class Agency extends BaseController
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
