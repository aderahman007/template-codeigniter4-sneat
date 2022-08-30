<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
<<<<<<< HEAD
use App\Libraries\SendMail;
=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33

class AuthController extends BaseController
{

    protected $validation;
    protected $db;
    protected $usersModel;
<<<<<<< HEAD
    protected $sendMail;
=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33

    public function __construct()
    {
        $this->validation   =  \Config\Services::validation();
        $this->db           = \Config\Database::connect();
        $this->usersModel   = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Auth Login',
            'js'    => 'auth.js',
        ];
        return view('auth/login', $data);
    }

    public function login(){
        if ($this->request->isAJAX()) {

            $validasi = $this->validate([
                'email_username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email atau username harus di isi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus di isi',
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'email_username' => $this->validation->getError('email_username'),
                        'password' => $this->validation->getError('password'),
                    ]
                ];
            } else {
                $email_username = $this->request->getVar('email_username');
                $password = $this->request->getVar('password');
                $data = $this->usersModel->where('username', $email_username)->orWhere('email', $email_username)->first();

                if ($data) {
                    $pass = $data['password'];
                    $verify_pass = password_verify($password, $pass);
                    if ($verify_pass) {
                        $session_data = [
                            'id'       => encrypt_url($data['id']),
                            'email'     => $data['email'],
                            'nama'     => $data['nama'],
                            'foto' => $data['foto'],
                            'hak_akses'    => $data['hak_akses'],
                            'logged_in'     => TRUE,
                        ];
                        session()->set($session_data);
                        $this->usersModel->update(['lasted_login' => date('Y-m-d H:i:s')], ['id' => $data['id']]);
                        $msg = [
                            'status' => 200,
                            'direct' => ($data['hak_akses'] == 'admin') ? site_url('admin') : site_url(),
                            'message' => 'Berhasil login!'
                        ];
                    } else {
                        $msg = [
                            'status' => 401,
                            'message' => 'Password anda salah!'
                        ];
                    }
                } else {
                    $msg = [
                        'status' => 401,
                        'message' => 'Email atau username tidak ditemukan!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }

    public function form_register(){
        $data = [
            'title' => 'Auth Register',
            'js'    => 'auth.js',
        ];
        return view('auth/register', $data);
    }

    public function register(){
        if ($this->request->isAJAX()) {
            $validasi = $this->validate([
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama lengkap harus di isi'
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
                        'required' => 'email harus di isi',
                        'is_unique' => 'Email sudah digunakan',
                        'valid_email' => 'Email tidak valid',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus di isi'
                    ]
                ],
                'ulangi_password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Ulangi password harus di isi',
                        'matches' => 'password tidak sama'
                    ]
                ],
                'terms' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Terms and condition harus di checklis',
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('nama_lengkap'),
                        'username' => $this->validation->getError('username'),
                        'email' => $this->validation->getError('email'),
                        'password' => $this->validation->getError('password'),
                        'ulangi_password' => $this->validation->getError('ulangi_password'),
                        'terms' => $this->validation->getError('terms'),
                    ]
                ];
            } else {
                $data = [
                    'nama' => $this->request->getVar('nama_lengkap'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                    'hak_akses' => 'user',
                    'status' => 'aktif',
                    'foto' => 'default.png',
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->usersModel->insert($data);

                $msg = [
                    'message' =>  'Your account has been created, please sign in first!',
                ];
            }

            echo json_encode($msg);
        }
    }

    public function form_forgot()
    {
        $data = [
            'title' => 'Forgot Password',
            'js'    => 'auth.js',
        ];
        return view('auth/forgot', $data);
    }

    public function forgot()
    {
        if ($this->request->isAJAX()) {
<<<<<<< HEAD
            $this->sendMail = new SendMail();

=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
            $validasi = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email is requires',
                        'valid_email' => 'Email not valid',
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'email' => $this->validation->getError('email'),
                    ]
                ];
            } else {
                $email = $this->request->getVar('email');
                $user = $this->usersModel->where('email', $email)->first();
                
                if ($user) {
                    $token  = encrypt_url($user['email']);
                    
                    $set_token = $this->set_token($user['id'], $token);

                    if ($set_token) {
                        $data   = [
                            'link'  => site_url('auth/reset/' . $token),
                            'logo'  => sistem()->logo,
                            'nama'  => sistem()->nama,
                        ];
                        $message    = view('auth/email_reset', $data);
<<<<<<< HEAD
                        $from = sistem()->email;
                        $name = sistem()->nama . ' | Customer Service';
                        $to = $user['email'];
                        $subject = sistem()->nama . ' | Forgot Your Password?';

                        $send_email = $this->sendMail->send_mail($from, $name, $to, $subject, $message);
    
                        if ($send_email == true) {
=======

                        $email      = \config\Services::email();
                        $email->setTo($user['email']);
                        $email->setFrom(sistem()->email, sistem()->nama . ' | Customer Service');
                        $email->setSubject(sistem()->nama . ' | Forgot Your Password?');
                        $email->setMessage($message);
    
                        if ($email->send()) {
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
                            $msg = [
                                'status'    => 200,
                                'message'   => 'Email has been sended and active until 60 minute! Please check your email or your spam!',
                            ];
                        }else {
                            $msg = [
                                'status' => 500,
<<<<<<< HEAD
                                'message' => $send_email
=======
                                'message' => 'Email couldn`t be send!'
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33
                            ];
                        }
                    }else {
                        $msg = [
                            'status' => 500,
                            'message' => 'Token couldn`t be generate!'
                        ];
                    }

                } else {
                    $msg = [
                        'status'    => 401,
                        'message'   => 'Email not found!'
                    ];
                }
            }
            echo json_encode($msg);
        }
    }

    public function form_reset($token)
    {
        $data = [
            'title' => 'Reset Your Password',
            'token' => $token,
            'js'    => 'auth.js',
        ];
        return view('auth/reset_password', $data);
    }

    public function reset_password()
    {
        if ($this->request->isAJAX()) {
            $validasi = $this->validate([
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus di isi'
                    ]
                ],
                'ulangi_password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Ulangi password harus di isi',
                        'matches' => 'password tidak sama'
                    ]
                ],
            ]);

            if (!$validasi) {
                $msg = [
                    'error' => [
                        'password' => $this->validation->getError('password'),
                        'ulangi_password' => $this->validation->getError('ulangi_password'),
                    ]
                ];
            } else {
                $token = $this->request->getVar('token');
                $password = $this->request->getVar('password');
                $user = $this->usersModel->where('reset_token', $token)->first();

                if ($user) {
                    $data_password = [
                        'password' => password_hash($password, PASSWORD_BCRYPT),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    $has_changed = $this->usersModel->update($user['id'], $data_password);
                    $clear_token = $this->set_token($user['id'], '(NULL)');

                    if ($has_changed && $clear_token == true) {
                        
                        $data_email   = [
                            'logo'  => sistem()->logo,
                            'nama'  => sistem()->nama,
                            'tanggal' => date('Y-m-d', strtotime($data_password['updated_at']))
                        ];
                        $message    = view('auth/email_confirm', $data_email);

                        $email      = \config\Services::email();
                        $email->setTo($user['email']);
                        $email->setFrom(sistem()->email, sistem()->nama . ' | Customer Service');
                        $email->setSubject(sistem()->nama . ' | Confirm of Changed Your Password?');
                        $email->setMessage($message);

                        if ($email->send()) {
                            $msg = [
                                'status'    => 200,
                                'message'   => 'Your password was recenly changed!',
                            ];
                        }
                    }else {
                        $msg = [
                            'status'    => 500,
                            'message'   => 'Opps! Any wrong we couldn`t change your password!',
                        ];
                    }
                }else {
                    $msg = [
                        'status'    => 500,
                        'message'   => 'Your token not valid or was expired!',
                    ];
                }
            }

            echo json_encode($msg);
        }

        
    }

    
    public function logout(){
        if ($this->request->isAjax()) {
            session()->destroy();
            $msg = [
                'status' => 200,
                'message' => 'Berhasil logout!'
            ];
            echo json_encode($msg);
        }
    }

    private function set_token($id_user, $token){
        $has_set = $this->usersModel->update($id_user, ['reset_token' => $token, 'updated_at' => date('Y-m-d H:i:s')]);
        if ($has_set) {
            return true;
        }else {
            return false;
        }
    }
}
