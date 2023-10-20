<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser;
    }
    public function index()
    {
        $data = [
            'menu' => 'masteranggota',
            'submenu' => 'user',
            'judul' => 'User',
            'page' => 'user/v_index',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Add()
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'user',
            'judul' => 'Tambah User',
            'page' => 'user/v_add',

        ];
        return view('v_template_admin', $data);
    }

    public function Simpan()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                    'is_unique' => '{field} sudah digunakan, cari yang lain !',
                ]
            ],
            'password' => [
                'label' => 'Password',
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
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => '{field} wajib diisi!',
                        'max_size' => '{field} max 1024 kb!',
                        'mime_in' => '{field} format foto png/jpg/jpeg!',
                        

                    ]
                    ]
        ])) {
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getName();
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => '0',
                'foto' =>  $nama_file,
                
            ];
           // memasukan file foto ke foldel foto
           $foto->move('foto',$nama_file);
           $this->ModelUser->Add($data);
           session()->setFlashdata('pesan','Data Berhasil Disimpan');
           return redirect()->to(base_url('User'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/Add'))->withInput('validation',\Config\Services::validation());
        }
    }
    /**
     * Summary of Update
     * @param mixed $id_user
     * @return string
     */
    public function Update($id_user)
    {
        $data = [
            'menu' => 'pengaturan',
            'submenu' => 'user',
            'judul' => 'Edit User',
            'page' => 'user/v_update',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('v_template_admin', $data);
    }
    public function Edit($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'email' => [
                'label' => 'Email',
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
            'no_hp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                       
                        'max_size' => '{field} max 1024 kb!',
                        'mime_in' => '{field} format foto png/jpg/jpeg!',
                        

                    ]
                    ]
        ])) {
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            if ($foto->getError()== 4) {
                //jika tidak ganti gambar
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'level' => $this->request->getPost('level'),                
                ];
               
               $this->ModelUser->UpdateData($data);
            } else {
                // hapus gambar lama 
                $user = $this->ModelUser->DetailData($id_user);
                if ($user['foto'] <> '') {
                    unlink('foto/'. $user['foto']);
                }
               //jika ganti gambar
            $nama_file = $foto->getName();
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'level' => $this->request->getPost('level'),
                'foto' =>  $nama_file,
                
            ];
           // memasukan file foto ke foldel foto
           $foto->move('foto',$nama_file);
           $this->ModelUser->UpdateData($data);
            }
           session()->setFlashdata('pesan','Data Berhasil Diupdate');
           return redirect()->to(base_url('User'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/Update/'. $id_user));
        }
    }

    public function DeleteData($id_user)
    {
         // hapus gambar 
         $user = $this->ModelUser->DetailData($id_user);
         if ($user['foto'] <> '') {
             unlink('foto/'. $user['foto']);
         }

         $data = [
            'id_user'=> $id_user ];
            $this->ModelUser->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('User'));
    }
}
