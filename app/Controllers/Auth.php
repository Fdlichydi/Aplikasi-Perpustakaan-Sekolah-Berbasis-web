<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelKelas;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth;
        $this->ModelKelas = new ModelKelas;
    }
    public function index()
    {
        $data = [
            // 'judul' => 'Login',
            // 'page' => 'v_login',
            'judul' => 'Login Admin',
            'page' => 'v_login_admin',
        ];
        return view('v_template_login', $data);
    }

    public function LoginAdmin()
    {
        $data = [
            'judul' => 'Login Admin',
            'page' => 'v_login_admin',
        ];
        return view('v_template_login', $data);
    }
    // public function CekLoginAdmin()
    // {
    //     if ($this->validate([
    //         'email' => [
    //             'label' => 'E-mail',
    //             'rules' => 'required|valid_email',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!',
    //                 'valid_email' => '{field} harus format e-mail!',
    //             ]
    //         ],
    //         'password' => [
    //             'label' => 'Password',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi!',

    //             ]
    //         ]
    //     ])) {
    //         //jika entry valid
    //         $email = $this->request->getPost('email');
    //         $password = $this->request->getPost('password');
    //         $cek_login = $this->ModelAuth->LoginAdmin($email, $password);
    //         if ($cek_login) {
    //             //jika logi berhasil
    //             session()->set('nama_user', $cek_login['nama_user']);
    //             session()->set('email', $cek_login['email']);
    //             session()->set('level', $cek_login['level']);
    //             return redirect()->to(base_url('Admin'));
    //         } else {
    //             //jika gagal login karena email atau password salah
    //             session()->setFlashdata('pesan', 'Email atau Password Salah');
    //             return redirect()->to(base_url('Auth/LoginAdmin'));
    //         }
    //     } else {
    //         //jika entry tidak valid
    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('Auth/LoginAdmin'));
    //     }
    // }

    public function CekLoginAdmin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'valid_email' => '{field} harus format e-mail!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ]
        ])) {
            //jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginAdmin($email, $password);

            if ($cek_login) {
                //jika datanya cocok
                $level = $cek_login['level'];
                if ($level === "0") {
                    session()->set('nama_user', $cek_login['nama_user']);
                    session()->set('email', $cek_login['email']);
                    session()->set('level', $cek_login['level']);

                    //login
                    return redirect()->to(base_url('Admin'));
                } elseif ($level === "1") {
                    session()->set('nama_user', $cek_login['nama_user']);
                    session()->set('email', $cek_login['email']);
                    session()->set('level', $cek_login['level']);
                    //login
                    return redirect()->to(base_url('Admin/index1'));
                }
            } else {
                //jika gagal login karena email atau password salah
                session()->setFlashdata('pesan', 'Email atau Password Salah');
                return redirect()->to(base_url('Auth/LoginAdmin'));
            }
        } else {
            //jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAdmin'));
        }
    }

    public function LoginAnggota()
    {
        $data = [
            'judul' => 'Login Anggota',
            'page' => 'v_login_anggota',
        ];
        return view('v_template_login', $data);
    }
    public function CekLoginAnggota()
    {
        if ($this->validate([
            'nis' => [
                'label' => 'Nis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ]
        ])) {
            //jika entry valid
            $nis = $this->request->getPost('nis');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->LoginAnggota($nis, $password);
            if ($cek_login) {
                //jika logi berhasil
                session()->set('id_anggota', $cek_login['id_anggota']);
                session()->set('nama_siswa', $cek_login['nama_siswa']);
                session()->set('level', 'Anggota');
                return redirect()->to(base_url('Anggota'));
            } else {
                //jika gagal login karena email atau password salah
                session()->setFlashdata('pesan', 'Nis atau Password Salah');
                return redirect()->to(base_url('Auth/LoginAnggota'));
            }
        } else {
            //jika entry tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAnggota'));
        }
    }
    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        // session()->setFlashdata('pesan', 'Logout Berhasil');
        return redirect()->to(base_url('Home'));
    }
    public function LogOutAnggota()
    {
        session()->remove('id_anggota');
        session()->remove('nama_siswa');
        session()->remove('level');
        // session()->setFlashdata('pesan', 'Logout Berhasil');
        return redirect()->to(base_url('Auth/Index'));
    }

    public function Register()
    {
        $data = [
            'judul' => 'Daftar Anggota',
            'page' => 'v_daftar_anggota',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_login', $data);
    }
    public function Daftar()
    {
        if ($this->validate([
            'nis' => [
                'label' => 'Nis',
                'rules' => 'required|is_unique[tbl_anggota.nis]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} sudah terdaftar !',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ],
            'no_hp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',

                ]
            ],
            'ulangi_password' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'matches' => '{field} tidak sama!',

                ]
            ]
        ])) {
            //jika lolos validasi
            $data = [
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'no_hp' => $this->request->getPost('no_hp'),
                'password' => $this->request->getPost('password'),
                'verifikasi' => '0',
                'foto' => 'user.jpg',

            ];
            $this->ModelAuth->Daftar($data);
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login');
            return redirect()->to(base_url('Auth/Register'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('validation', \Config\Services::validation());
        }
    }
}
