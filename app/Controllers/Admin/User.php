<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class User extends AdminBaseController
{
    use ResponseTrait;

    public function index()
    {
        $this->addJsEntries('js/admin/users.js');

        $data["page"] = "users";

        return view("admin/users/user-view", $data);
    }

    /**
     * Show create form for user
     *
     * @return void
     */
    public function new()
    {
        $data['page'] = 'users-create';

        return view('admin/users/user-create-view', $data);
    }

    public function create() {}

    /**
     * Show edit user form
     *
     * @param string|int|null $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->addJsEntries('js/admin/users_edit.js');

        $model = model(UserModel::class);

        $data['user'] = $model->findUser($id);

        return view('admin/users/user_edit', $data);
    }

    /**
     * Update user information
     *
     * @param string|int|null $id
     * @return void
     */
    public function update($id = null)
    {
        $model = model(UserModel::class);

        $data = [
            'user_lname' => $this->request->getPost('last_name'),
            'user_fname' => $this->request->getPost('first_name'),
            'user_mname' => $this->request->getPost('middle_name'),
            'user_uname' => $this->request->getPost('username'),
            'user_inactive' => $this->request->getPost('inactive') ? 1 : 0,
        ];

        $rule = [
            'user_lname' => 'required',
            'user_fname' => 'required',
            'user_uname' => 'required'
        ];

        if (!$this->validateData($data, $rule)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, $data);

        return redirect()->to('/admin/users')->with('success', 'User updated successfully.');
    }

    /**
     * Reset the password of the user
     *
     * @param string|int $id
     * @return void
     */
    public function resetPassword($id = null)
    {
        if ($id == null) {
            return $this->failNotFound('User ID is required.');
        }

        $model = model(UserModel::class);

        $data = [
            'user_pword' => password_hash('Toyota12345', PASSWORD_DEFAULT),
        ];

        $model->update($id, $data);

        return $this->respond(['message' => 'Password reset successfully.'], ResponseInterface::HTTP_OK);
    }

    public function delete() {}
}
