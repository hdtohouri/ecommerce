<?php

namespace App\Controllers\Common\Users;

use App\Controllers\BaseController;

class CustomeursLogout extends BaseController
{
    public function index()
    {
        session()->remove('is_logged_in');
        session()->destroy();
	    return redirect()->to(base_url());
    }
}
