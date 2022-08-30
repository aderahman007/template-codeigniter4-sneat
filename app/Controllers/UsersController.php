<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;
use Hermawan\DataTables\DataTable;

class UsersController extends BaseController
{

    protected $usersModel;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->validation =  \Config\Services::validation();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Users',
            'active' => 'users',
            'js' => 'users.js',
        ];

        return view('admin/users/index', $data);
    }

    public function datatables()
    {
        if ($this->request->isAjax()) {
            $builder = $this->db->table('users')
                ->select('id, nama, hak_akses, lasted_login, status, foto')
                ->orderBy('id', 'desc');

            return DataTable::of($builder)
                ->addNumbering('no')
                ->add('lasted_login', function ($row) {
                    if ($row->lasted_login == null) {
                        $last = '<span class="badge rounded-pill bg-label-dark">Belum Pernah Login</span>';
                    } else {
                        $last = '<span class="badge rounded-pill bg-label-info">' . convertTanggal(date('Y-m-d', strtotime($row->lasted_login))) . ' ' . date('H:i:s', strtotime($row->lasted_login)) . '</span>';
                    }
                    return $last;
                })
                ->add('status', function ($row) {
                    if ($row->status == 'aktif') {
                        $label_color = 'success';
                        $label = 'Aktif';
                    } else {
                        $label_color = 'danger';
                        $label = 'Tidak Aktif';
                    }
                    return '<span class="badge rounded-pill bg-' . $label_color . '">' . $label . '</span>';
                })
                ->add('hak_akses', function ($row) {
                    if ($row->hak_akses == 'admin') {
                        $color = 'primary';
                        $label = 'Admin';
                    } else {
                        $color = 'info';
                        $label = $row->hak_akses;
                    }
                    return '<span class="badge rounded-pill bg-' . $color . '">' . $label . '</span>';
                })
                ->add('option', function ($row) {
                    return "<div class=\"dropdown text-center\">
                            <button type=\"button\" class=\"btn p-0 dropdown-toggle hide-arrow\" data-bs-toggle=\"dropdown\">
                              <i class=\"bx bx-dots-vertical-rounded\"></i>
                            </button>
                            <div class=\"dropdown-menu\">
                              <a class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"detail('" . encrypt_url($row->id) . "')\"><i class=\"bx bx-show-alt me-1\"></i> Detail</a>
                              <a class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"edit('" . encrypt_url($row->id) . "')\"><i class=\"bx bx-edit-alt me-1\"></i> Edit</a>
                              <a class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"hapus('" . encrypt_url($row->id) . "')\"><i class=\"bx bx-trash me-1\"></i> Delete</a>
                            </div>
                          </div>";
                })
                ->toJson(true);
        }
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'message' => view('admin/users/form_add')
            ];
            echo json_encode($msg);
        }
    }

    public function store()
    {
        if ($this->request->isAJAX()) {
            $validasi = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'required' => 'username harus di isi',
                        'is_unique' => 'Username sudah digunakan',
                    ]
                ],
                'email' => [
                    'rules' => 'required|is_unique[users.email]|valid_email',
                    'errors' => [
                        'required' => 'Email harus di isi',
                        'is_unique' => 'Email sudah digunakan',
                        'valid_email' => 'Email tidak valid',
                    ]
                ],
                'telepon' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Telepon harus di isi',
                        'numeric' => 'Telepon harus berupa angka',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'password harus di isi'
                    ]
                ],
                'ulangi_password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Ulangi password harus di isi',
                        'matches' => 'password tidak sama'
                    ]
                ],
                'hak_akses' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Hak Akses harus di isi'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus di isi'
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]|is_image[foto]|max_size[foto,2096]',
                    'errors' => [
                        'mime_in' => 'File Extention Harus Berupa png/jpg/jpeg/JPG',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'username' => $this->validation->getError('username'),
                        'email' => $this->validation->getError('email'),
                        'telepon' => $this->validation->getError('telepon'),
                        'password' => $this->validation->getError('password'),
                        'ulangi_password' => $this->validation->getError('ulangi_password'),
                        'hak_akses' => $this->validation->getError('hak_akses'),
                        'status' => $this->validation->getError('status'),
                        'foto' => $this->validation->getError('foto'),
                    ]
                ];
            } else {
                $foto = $this->request->getFile('foto');
                $filename = $foto->getRandomName();

                if ($foto->isValid()) {
                    $filename = $foto->getRandomName();
                    $foto->move('writable/images/profile', $filename);
                } else {
                    $filename = 'default.png';
                }

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'hak_akses' => $this->request->getVar('hak_akses'),
                    'status' => $this->request->getVar('status'),
                    'foto' => $filename,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->usersModel->insert($data);


                $msg = [
                    'message' =>  'Data berhasil di tambah',
                ];
            }

            echo json_encode($msg);
        }
    }

    public function edit()
    {
        if ($this->request->isAjax()) {
            $id = decrypt_url($this->request->getVar('id'));
            $users = $this->usersModel->find($id);
            $data = [
                'users' => $users,
            ];

            $msg = [
                'message' => view('admin/users/form_edit', $data),
            ];

            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = decrypt_url($this->request->getVar('id'));
            $old_data = $this->usersModel->find($id);
            if (count($old_data) > 0 && $old_data['username'] == $this->request->getVar('username')) {
                $rules_username = 'required';
            } else {
                $rules_username = 'required|is_unique[users.username]';
            }
            if (count($old_data) > 0 && $old_data['email'] == $this->request->getVar('email')) {
                $rules_email = 'required|valid_email';
            } else {
                $rules_email = 'required|is_unique[users.email]|valid_email';
            }

            $validasi = $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama harus di isi'
                    ]
                ],
                'username' => [
                    'rules' => $rules_username,
                    'errors' => [
                        'required' => 'username harus di isi',
                        'is_unique' => 'Username sudah digunakan',
                    ]
                ],
                'email' => [
                    'rules' => $rules_email,
                    'errors' => [
                        'required' => 'email harus di isi',
                        'is_unique' => 'Email sudah digunakan',
                        'valid_email' => 'Email tidak valid',
                    ]
                ],
                'telepon' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Telepon harus di isi',
                        'numeric' => 'Telepon harus berupa angka',
                    ]
                ],
                'ulangi_password' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'password tidak sama'
                    ]
                ],
                'hak_akses' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Hak Akses harus di isi'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status harus di isi'
                    ]
                ],
                'foto' => [
                    'rules' => 'mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]|is_image[foto]|max_size[foto,2096]',
                    'errors' => [
                        'mime_in' => 'File Extention Harus Berupa png/jpg/jpeg/JPG',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                        'username' => $this->validation->getError('username'),
                        'email' => $this->validation->getError('email'),
                        'telepon' => $this->validation->getError('telepon'),
                        'hak_akses' => $this->validation->getError('hak_akses'),
                        'status' => $this->validation->getError('status'),
                        'ulangi_password' => $this->validation->getError('ulangi_password'),
                        'foto' => $this->validation->getError('foto'),
                    ]
                ];
            } else {
                $foto = $this->request->getFile('foto');
                if ($foto->isValid()) {
                    $filename = $foto->getRandomName();
                    @unlink('writable/images/profile/' . $old_data['foto']);
                    $foto->move('writable/images/profile', $filename);
                } else {
                    $filename = $old_data['foto'];
                }

                if ($this->request->getVar('password') != '') {
                    $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
                } else {
                    $password = $old_data['password'];
                }

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'password' => $password,
                    'hak_akses' => $this->request->getVar('hak_akses'),
                    'status' => $this->request->getVar('status'),
                    'foto' => $filename,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->usersModel->update($id, $data);


                $msg = [
                    'message' =>  'Data berhasil di simpan',
                ];
            }

            echo json_encode($msg);
        }
    }

    public function detail()
    {
        if ($this->request->isAjax()) {
            $id = decrypt_url($this->request->getVar('id'));
            $data = [
                'users' => $this->usersModel->find($id)
            ];

            $msg = [
                'message' => view('admin/users/form_detail', $data),
            ];

            echo json_encode($msg);
        }
    }

    public function change_password()
    {
        if ($this->request->isAjax()) {
            $validasi = $this->validate([
                'password_lama' => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Password lama harus di isi',
                        'min_length' => 'Password harus di isi minimal 6 angka',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[3]|differs[password_lama]',
                    'errors' => [
                        'required' => 'Password harus di isi',
                        'min_length' => 'Password harus di isi minimal 3 angka',
                        'differs' => 'Password harus berbeda dengan password lama'
                    ]
                ],
                'ulangi_password' => [
                    'rules' => 'required|min_length[3]|matches[password]',
                    'errors' => [
                        'required' => 'Ulangi password harus di isi',
                        'min_length' => 'Password harus di isi minimal 3 angka',
                        'matches' => 'Password tidak sama'
                    ]
                ]
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'password_lama' => $this->validation->getError('password_lama'),
                        'password' => $this->validation->getError('password'),
                        'ulangi_password' => $this->validation->getError('ulangi_password'),
                    ]
                ];
            } else {
                $id = decrypt_url($this->request->getVar('id'));
                $password_lama = $this->request->getVar('password_lama');
                $data = $this->usersModel->find($id);
                $cek_password = password_verify($password_lama, $data['password']);

                if (!$cek_password) {
                    $msg = [
                        'error' => [
                            'password_lama' => 'Password lama tidak sesuai',
                        ]
                    ];
                } else {
                    $changed_password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

                    $data = [
                        'password' => $changed_password
                    ];

                    $this->usersModel->update($id, $data);

                    $msg = [
                        'message' => 'Password berhasil di ubah!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = decrypt_url($this->request->getVar('id'));
            $old_data = $this->usersModel->find($id);
            if ($old_data['foto'] != 'default.png') {
                @unlink('writable/images/profile/' . $old_data['foto']);
            }
            $this->usersModel->delete($id);

            $msg = [
                'message' => 'Data berhasil dihapus!',
            ];
            echo json_encode($msg);
        }
    }
}
