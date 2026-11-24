<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminBaseController;
use App\Models\ConfigModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class ContactUs extends AdminBaseController
{
    use ResponseTrait;

    public function index()
    {
        $this->addJsEntries('js/admin/contact_us.js');

        $model = model(ConfigModel::class);

        $data['contacts'] = $model->getContacts();

        return view('admin/contact_us', $data);
    }

    public function new()
    {
        $this->addJsEntries('js/admin/contact_us_create.js');

        return view('admin/contact_us_create');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->to('/admin/contact-us')->with('error', 'Contact ID is required.');
        }

        $model = model(ConfigModel::class);

        $model->where('config_no', $id);
        $contact = $model->first();

        return view('admin/contact_us_edit', compact('contact'));
    }

    public function create()
    {
        $data =  $this->request->getPost();

        $rules = [
            'title' => 'required|string|max_length[255]',
            'value' => 'required|string|max_length[255]',
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = model(ConfigModel::class);

        $entry = [
            'config_code' => url_title($data['title'], '_', true),
            'config_label' => 'Department Contact Numbers',
            'config_title' => $data['title'],
            'config_option' => 0,
            'config_value' => $data['value'],
        ];

        $model->insert($entry);

        return redirect()->to('/admin/contact-us')->with('success', 'Contact added successfully.');
    }

    public function update($id = null)
    {
        if ($id == null) {
            return redirect()->to('/admin/contact-us')->with('error', 'Contact ID is required.');
        }

        $data =  $this->request->getPost();

        $rules = [
            'title' => 'required|string|max_length[255]',
            'value' => 'required|string|max_length[255]',
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = model(ConfigModel::class);

        $entry = [
            'config_title' => $data['title'],
            'config_value' => $data['value'],
        ];

        $model->update($id, $entry);

        return redirect()->to('/admin/contact-us')->with('success', 'Contact updated successfully.');
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return redirect()->to('/admin/contact-us')->with('error', 'Contact ID is required.');
        }

        $model = model(ConfigModel::class);

        $model->delete($id);

        return redirect()->to('/admin/contact-us')->with('success', 'Contact deleted successfully.');
    }
}
