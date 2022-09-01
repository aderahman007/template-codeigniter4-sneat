<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
	protected $allowedFields = ['id', 'nama', 'username', 'email', 'telepon', 'password', 'hak_akses', 'foto', 'lasted_login', 'status', 'reset_token', 'created_at', 'updated_at'];
}
