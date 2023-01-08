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

        if(isset($_SESSION['type']))
        $data['layout']='loggedin';
        else
        $data['layout']='nologin';
        
        return view('pages/about',$data);
    }
}
