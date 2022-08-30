<?php

namespace App\Controllers;

use App\Models\SistemModel;

class SistemController extends BaseController
{
    protected $validation;
    protected $db;
    protected $modelSistem;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->db = db_connect();
        $this->modelSistem = new SistemModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Sistem',
            'active' => 'manajemen_sistem',
            'js' => 'sistem.js',
            'sistem' => $this->db->table('manajemen_sistem')->get()->getFirstRow('array'),
        ];
        return view('admin/sistem/index', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id_sistem = decrypt_url($this->request->getVar('id'));

            $validasi = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                // 'owner' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => 'Owner harus di isi',
                //     ]
                // ],
                'telpon' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Telpon harus di isi',
                        'numeric' => 'Telpon harus berupa angka'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email harus di isi',
                        'valid_email' => 'Harus menggunakan email yang valid'
                    ]
                ],
                // 'running_text' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => 'Running Text harus di isi',
                //     ]
                // ],
                // 'alamat' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => 'Alamat harus di isi',
                //     ]
                // ],
                'tentang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentang harus di isi',
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        // 'owner' => $this->validation->getError('owner'),
                        'telpon' => $this->validation->getError('telpon'),
                        'email' => $this->validation->getError('email'),
                        // 'running_text' => $this->validation->getError('running_text'),
                        // 'alamat' => $this->validation->getError('alamat'),
                        'tentang' => $this->validation->getError('tentang'),
                        // 'logo' => $this->validation->getError('logo'),
                    ]
                ];
            } else {
                $data = [
                    'nama' => $this->request->getVar('nama'),
                    // 'owner' => $this->request->getVar('owner'),
                    'telpon' => $this->request->getVar('telpon'),
                    'email' => $this->request->getVar('email'),
                    // 'alamat' => $this->request->getVar('alamat'),
                    // 'running_text' => $this->request->getVar('running_text'),
                    'tentang' => $this->request->getVar('tentang'),
                    // 'logo' => $filename,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->modelSistem->update($id_sistem, $data);

                if ($this->modelSistem->affectedRows()) {
                    $msg = [
                        'status' =>  'success',
                        'message' =>  'Data berhasil di simpan',
                    ];
                } else {
                    $msg = [
                        'status' =>  'error',
                        'message' =>  'Data gagal di simpan',
                    ];
                }
            }

            echo json_encode($msg);
        }
    }

    public function save_logo_favicon()
    {
        if ($this->request->isAJAX()) {
            $tipe = $this->request->getVar('tipe');
            $id_sistem = decrypt_url($this->request->getVar('id'));
            $sistem = $this->db->table('manajemen_sistem')->getWhere(['id' => $id_sistem])->getRowArray();

            if ($tipe == 'logo') {
                $validasi = $this->validate([
                    'logo' => [
                        'rules' => 'mime_in[logo,image/png, image/gif]|is_image[logo]|max_size[logo,2048]',
                        'errors' => [
                            'mime_in' => 'File Extention Harus Berupa png/gif',
                            'max_size' => 'Ukuran File Maksimal 2 MB'
                        ]
                    ],
                ]);

                if (!$validasi) {
                    $msg = [
                        'error' => [
                            'message' => $this->validation->getError('logo'),
                        ]
                    ];
                } else {
                    $logo = $this->request->getFile('logo');
                    if ($logo->isValid()) {
                        $filename = $logo->getRandomName();
                        @unlink('writable/images/sistem/' . $sistem['logo']);
                        $logo->move('writable/images/sistem', $filename);
                    } else {
                        $filename = $sistem['logo'];
                    }

                    $data = [
                        'logo' => $filename
                    ];
                    $this->modelSistem->update($id_sistem, $data);
                    if ($this->modelSistem->affectedRows()) {
                        $msg = [
                                'status' =>  'success',
                                'message' =>  'Data berhasil di simpan',
                            ];
                    } else {
                        $msg = [
                                'status' =>  'error',
                                'message' =>  'Data gagal di simpan',
                            ];
                    }
                }
            } else {
                $validasi = $this->validate([
                    'favicon' => [
                        'rules' => 'mime_in[favicon,image/png, image/ico, image/x-icon]|is_image[favicon]|max_size[favicon,800]',
                        'errors' => [
                            'mime_in' => 'File Extention Harus Berupa ico atau png',
                            'max_size' => 'Ukuran File Maksimal 800 Kb'
                        ]
                    ],
                ]);
                if (!$validasi) {
                    $msg = [
                        'error' => [
                            'message' => $this->validation->getError('favicon'),
                        ]
                    ];
                } else {
                    $favicon = $this->request->getFile('favicon');
                    if ($favicon->isValid()) {
                        $filename = $favicon->getRandomName();
                        @unlink('writable/images/sistem/' . $sistem['favicon']);
                        $favicon->move('writable/images/sistem', $filename);
                    } else {
                        $filename = $sistem['favicon'];
                    }

                    $data = [
                        'favicon' => $filename
                    ];
                    $this->modelSistem->update($id_sistem, $data);
                    if ($this->modelSistem->affectedRows()) {
                        $msg = [
                                'status' =>  'success',
                                'message' =>  'Data berhasil di simpan',
                            ];
                    } else {
                        $msg = [
                                'status' =>  'error',
                                'message' =>  'Data gagal di simpan',
                            ];
                    }
                }
            }

            echo json_encode($msg);
        }
    }
}
