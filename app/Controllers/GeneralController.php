<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GeneralController extends BaseController
{

    protected $db;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
    }

    public function encrypt_url()
    {
        if ($this->request->isAjax()) {
            $code = $this->request->getVar('kode');
            echo json_encode(encrypt_url($code));
        }
    }

    public function decrypt_url()
    {
        if ($this->request->isAjax()) {
            $code = $this->request->getVar('kode');
            echo json_encode(decrypt_url($code));
        }
    }
}
