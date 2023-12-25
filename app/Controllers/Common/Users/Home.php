<?php

namespace App\Controllers\Common\Users;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function __construct()
    {
        helper('number');
        helper('form');
    }

    public function index()
    {
        return view('frontend/layout/users/user_account');
    }

    public function orders()
    {
        return view('frontend/layout/users/user_orders');
    }
}
