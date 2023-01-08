<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function dashboard()
    {
        $data=[
            'page_title'=>'Customer Dashboard',
            'page'=>'dashboard'
        ];

        return view('pages/users/customer/dashboard',$data);
    }
}
