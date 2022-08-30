<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
<<<<<<< HEAD
	protected $allowedFields = ['id', 'nama', 'username', 'email', 'telepon', 'password', 'hak_akses', 'foto', 'lasted_login', 'status', 'reset_token', 'created_at', 'updated_at'];
=======
	protected $allowedFields = ['id', 'nama', 'username', 'email', 'password', 'hak_akses', 'foto', 'lasted_login', 'status', 'reset_token', 'created_at', 'updated_at'];
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
}
