<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBuku;
use App\Models\ModelKategori;
use App\Models\ModelPenerbit;
use App\Models\ModelPenulis;
use App\Models\ModelRak;

class Buku extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelBuku = new ModelBuku;
        $this->ModelKategori = new ModelKategori;
        $this->ModelPenerbit = new ModelPenerbit;
        $this->ModelPenulis = new ModelPenulis;
        $this->ModelRak = new ModelRak;
    }
    public function index()
    {
        $data = [
            'menu' => 'buku',
            'submenu' => '',
            'judul' => 'Buku',
            'page' => 'buku/v_index',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function index1()
    {
        $data = [
            'menu' => 'buku',
            'submenu' => '',
            'judul' => 'Buku',
            'page' => 'buku/v_index1',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_anggota', $data);
    }
    public function Add()
    {
        $data = [
            'menu' => 'buku',
            'submenu' => '',
            'judul' => 'Tambah Buku',
            'page' => 'buku/v_add',
            'buku' => $this->ModelBuku->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function Simpan()
    {
        if ($this->validate([
            'judul_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_penulis' => [
                'label' => 'Penulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_rak' => [
                'label' => 'Rak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            // 'isbn' => [
            //     'label' => 'ISBN',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'tahun' => [
            //     'label' => 'Tahun',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'bahasa' => [
            //     'label' => 'Bahasa',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'jumlah' => [
            //     'label' => 'Jumlah',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            'cover' => [
                'label' => 'Cover Buku',
                'rules' => 'uploaded[cover]|max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi!',
                    'max_size' => '{field} max 2048 kb!',
                    'mime_in' => '{field} format cover png/jpg/jpeg!',


                ]
            ]
        ])) {
            //jika lolos validasi
            $cover = $this->request->getFile('cover');
            $nama_file = $cover->getName();
            $data = [
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_penulis' => $this->request->getPost('id_penulis'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_rak' => $this->request->getPost('id_rak'),
                'isbn' => $this->request->getPost('isbn'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'jumlah' => $this->request->getPost('jumlah'),
                'cover' =>  $nama_file,

            ];
            // memasukan file cover ke foldel cover
            $cover->move('cover', $nama_file);
            $this->ModelBuku->Add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
            return redirect()->to(base_url('Buku'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/Add'))->withInput('validation', \Config\Services::validation());
        }
    }
    public function Update($id_buku)
    {
        
        $data = [
            'menu' => 'buku',
            'submenu' => 'buku',
            'judul' => 'edit Buku',
            'page' => 'buku/v_update',
            'buku' => $this->ModelBuku->DetailData($id_buku),
            'kategori' => $this->ModelKategori->AllData(),
            'penerbit' => $this->ModelPenerbit->AllData(),
            'penulis' => $this->ModelPenulis->AllData(),
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function Edit($id_buku)
    {
        if ($this->validate([
            'judul_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_penulis' => [
                'label' => 'Penulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'id_rak' => [
                'label' => 'Rak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            // 'isbn' => [
            //     'label' => 'ISBN',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'tahun' => [
            //     'label' => 'Tahun',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'bahasa' => [
            //     'label' => 'Bahasa',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            // 'jumlah' => [
            //     'label' => 'Jumlah',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            'cover' => [
                'label' => 'Cover Buku',
                'rules' => 'max_size[cover,2048]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} max 2048 kb!',
                    'mime_in' => '{field} format cover png/jpg/jpeg!',


                ]
            ]
        ])) {
            //jika lolos validasi
            $cover = $this->request->getFile('cover');
            if ($cover->getError()== 4) {
                //jika tidak ganti gambar
                $data = [
                    'id_buku' => $id_buku,
                    'judul_buku' => $this->request->getPost('judul_buku'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_penulis' => $this->request->getPost('id_penulis'),
                    'id_penerbit' => $this->request->getPost('id_penerbit'),
                    'id_rak' => $this->request->getPost('id_rak'),
                    'isbn' => $this->request->getPost('isbn'),
                    'tahun' => $this->request->getPost('tahun'),
                    'bahasa' => $this->request->getPost('bahasa'),
                    'jumlah' => $this->request->getPost('jumlah'),         
                ];
               
               $this->ModelBuku->UpdateData($data);
            } else {
                // hapus gambar lama 
                $user = $this->ModelBuku->DetailData($id_buku);
                if ($user['cover'] <> '') {
                    unlink('cover/'. $user['cover']);
                }
               //jika ganti gambar
            $nama_file = $cover->getName();
            $data = [
                'id_buku' => $id_buku,
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_penulis' => $this->request->getPost('id_penulis'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_rak' => $this->request->getPost('id_rak'),
                'isbn' => $this->request->getPost('isbn'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'jumlah' => $this->request->getPost('jumlah'),
                'cover' =>  $nama_file,
                
            ];
           // memasukan file cover ke foldel cover
           $cover->move('cover',$nama_file);
           $this->ModelBuku->UpdateData($data);
            }
           session()->setFlashdata('pesan','Data Berhasil Diupdate');
           return redirect()->to(base_url('Buku'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/Buku/'. $id_buku));
        }
    }
    public function DeleteData($id_buku)
    {
         // hapus gambar 
         $buku = $this->ModelBuku->DetailData($id_buku);
         if ($buku['cover'] <> '') {
             unlink('cover/'. $buku['cover']);
         }

         $data = [
            'id_buku'=> $id_buku ];
            $this->ModelBuku->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('Buku'));
    }

    public function halamanbaru()
    {
        $data = [
            'menu' => 'buku',
            'submenu' => 'pengembalian',
            'judul' => 'Ini Halaman Pengembalian',
            'page' => 'v_baru',
        ];
        return view('v_template_admin', $data);
    }
}
