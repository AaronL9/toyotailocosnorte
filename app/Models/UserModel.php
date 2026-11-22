<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_no';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        "user_lname",
        "user_fname",
        "user_mname",
        "user_uname",
        "user_pword",
        "user_encode",
        "user_encode_date",
        "user_inactive",
        "user_delete"
    ];

    public function findUser($id)
    {
        return $this->select([
            'user_no AS id',
            'user_lname AS last_name',
            'user_fname AS first_name',
            'user_mname AS middle_name',
            'user_uname AS username',
            'user_pword AS password',
            'user_encode AS created_by',
            'user_encode_date AS created_at',
            'user_inactive AS is_inactive',
            'user_delete AS is_deleted',
        ])->find($id);
    }
}
