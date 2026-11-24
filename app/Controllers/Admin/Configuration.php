<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Configuration extends AdminBaseController
{
    public function index()
    {
        return view('admin/configs');
    }
}
