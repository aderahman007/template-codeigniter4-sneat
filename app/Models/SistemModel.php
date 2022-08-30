<?php

namespace App\Models;

use CodeIgniter\Model;

class SistemModel extends Model
{

    protected $table = 'manajemen_sistem';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama', 'alamat', 'owner', 'telpon', 'email', 'logo', 'favicon', 'running_text', 'tentang', 'created_at', 'updated_at'];
}
