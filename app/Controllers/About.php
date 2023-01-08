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

        if(session()->get('isLoggedIn'))
        $data['layout']=session()->get('type');
        else
        $data['layout']='nologin';
        
        return view('pages/about',$data);
    }
}
