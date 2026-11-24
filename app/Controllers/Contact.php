<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function getIndex()
    {
        $data['page'] = 'contact';

        $model = model(ConfigModel::class);

        $data['contacts'] = $model->getContacts();

        return view("contact", $data);
    }
}
