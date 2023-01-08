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

        if(session()->get('isLoggedIn'))
        $data['layout']=session()->get('type');
        else
        $data['layout']='nologin';


        return view('pages/home',$data);
    }
}
