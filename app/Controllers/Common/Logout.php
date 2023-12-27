<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        session()->remove('logged_in');
        session()->destroy();
	    return redirect()->to(base_url('common/adminspace/login'));
    }
}
