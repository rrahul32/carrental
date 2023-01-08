<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[
            'page_title'=>'Home',
            'page'=>'home',
        ];

        if(isset($_SESSION['type']))
        $data['layout']='loggedin';
        else
        $data['layout']='nologin';


        return view('pages/home',$data);
    }
}
