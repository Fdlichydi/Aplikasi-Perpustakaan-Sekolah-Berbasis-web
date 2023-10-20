<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTransaksi;
use App\Models\ModelTransaksiKembali;
use App\Models\ModelKelas;
use App\Models\ModelBuku;

class Pengembalian extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTransaksi = new ModelTransaksi;
        $this->ModelTransaksiKembali = new ModelTransaksiKembali;
        $this->ModelKelas = new ModelKelas;
        $this->ModelBuku = new ModelBuku;
    }
    public function index()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'pengembalian',
            'judul' => 'Pengembalian Buku',
            'page' => 'v_transaksi_kembali',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'pengembalian' => $this->ModelTransaksiKembali->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }


    public function Add()
    {
        if ($this->validate([
            'tgl_pengembalian' => [
                'label' => 'Tanggal Pengembalian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ],
            'nama_siswa' => [
                'label' => 'Nama Siswa',
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
            // 'buku_dipinjam' => [
            //     'label' => 'Buku yang dipinjam',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi!',
                ]
            ]

        ])) {
            //jika lolos validasi
            // $bukudipinjam = $this->request->getPost('id_buku');
            $data = [
                'tgl_pengembalian' => $this->request->getPost('tgl_pengembalian'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_buku1' => $this->request->getPost('id_buku1'),
                'id_buku2' => $this->request->getPost('id_buku2'),
                'id_buku3' => $this->request->getPost('id_buku3'),
                'id_buku4' => $this->request->getPost('id_buku4'),
                'id_buku5' => $this->request->getPost('id_buku5'),
                'no_buku1' => $this->request->getPost('no_buku1'),
                'no_buku2' => $this->request->getPost('no_buku2'),
                'no_buku3' => $this->request->getPost('no_buku3'),
                'no_buku4' => $this->request->getPost('no_buku4'),
                'no_buku5' => $this->request->getPost('no_buku5'),
                'status' => $this->request->getPost('status'),
                'ket' => $this->request->getPost('ket')
            ];
            // $buku_dipinjam = implode(',', $bukudipinjam);
            // $data['id_buku'] = $buku_dipinjam;
            // print_r($data);die();
            $this->ModelTransaksiKembali->Add($data);
            session()->setFlashdata('pesan', 'Transaksi Berhasil Ditambahkan');
            return redirect()->to(base_url('Pengembalian'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Pengembalian/Add'))->withInput('validation', \Config\Services::validation());
        }
    }
    public function Edit($id_transaksi_kembali)
    {
        // $bukudipinjam = $this->request->getPost('id_buku');
        $data = [
            'id_transaksi_kembali'=>$id_transaksi_kembali,
            'tgl_pengembalian' => $this->request->getPost('tgl_pengembalian'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_buku1' => $this->request->getPost('id_buku1'),
            'id_buku2' => $this->request->getPost('id_buku2'),
            'id_buku3' => $this->request->getPost('id_buku3'),
            'id_buku4' => $this->request->getPost('id_buku4'),
            'id_buku5' => $this->request->getPost('id_buku5'),
            'no_buku1' => $this->request->getPost('no_buku1'),
            'no_buku2' => $this->request->getPost('no_buku2'),
            'no_buku3' => $this->request->getPost('no_buku3'),
            'no_buku4' => $this->request->getPost('no_buku4'),
            'no_buku5' => $this->request->getPost('no_buku5'),
            'status' => $this->request->getPost('status'),
            'ket' => $this->request->getPost('ket')
        ];
        // $buku_dipinjam = implode(',', $bukudipinjam);
        // $data['id_buku'] = $buku_dipinjam;
        // print_r($data);die();
        $this->ModelTransaksiKembali->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Pengembalian'));
    }
    public function Update($id_transaksi_kembali)
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'pengembalian',
            'judul' => 'Transaksi Buku Update',
            'page' => 'v_transaksi_kembali_edit',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'pengembalian' => $this->ModelTransaksiKembali->DetailData($id_transaksi_kembali),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function DeleteData($id_transaksi_kembali)
    {
        $data = [
            'id_transaksi_kembali' => $id_transaksi_kembali
        ];
        $this->ModelTransaksiKembali->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Pengembalian'));
    }
    public function Laporantrans()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'laporantrans',
            'judul' => 'Laporan Peminjaman Buku',
            'page' => 'v_laporantrans',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }
}
