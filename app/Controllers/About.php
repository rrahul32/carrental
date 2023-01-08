<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data=[
            'page_title'=>'About',
            'page'=>'about'
        ];

        return view('pages/about',$data);
    }
}
