<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTransaksi;
use App\Models\ModelKelas;
use App\Models\ModelBuku;

class Peminjaman extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTransaksi = new ModelTransaksi;
        $this->ModelKelas = new ModelKelas;
        $this->ModelBuku = new ModelBuku;
    }
    public function index()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_transaksi',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }


    public function Add()
    {
        if ($this->validate([
            'tgl_peminjaman' => [
                'label' => 'Tanggal Peminjaman',
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
            // 'status' => [
            //     'label' => 'Status',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib diisi!',
            //     ]
            // ]

        ])) {
            //jika lolos validasi
            // $bukudipinjam = $this->request->getPost('id_buku');
            $data = [
                'tgl_peminjaman' => $this->request->getPost('tgl_peminjaman'),
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
                'status1' => $this->request->getPost('status1'),
                'status2' => $this->request->getPost('status2'),
                'status3' => $this->request->getPost('status3'),
                'status4' => $this->request->getPost('status4'),
                'status5' => $this->request->getPost('status5'),
                'ket' => $this->request->getPost('ket')
            ];
            // $buku_dipinjam = implode(',', $bukudipinjam);
            // $data['id_buku'] = $buku_dipinjam;
            // print_r($data);die();
            $this->ModelTransaksi->Add($data);
            session()->setFlashdata('pesan', 'Transaksi Berhasil Ditambahkan');
            return redirect()->to(base_url('Peminjaman'));
        } else {
            //jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Peminjaman/Add'))->withInput('validation', \Config\Services::validation());
        }
    }
    public function Edit($id_transaksi)
    {
        // $bukudipinjam = $this->request->getPost('id_buku');
        $data = [
            'id_transaksi' => $id_transaksi,
            'tgl_peminjaman' => $this->request->getPost('tgl_peminjaman'),
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
            'status1' => $this->request->getPost('status1'),
            'status2' => $this->request->getPost('status2'),
            'status3' => $this->request->getPost('status3'),
            'status4' => $this->request->getPost('status4'),
            'status5' => $this->request->getPost('status5'),
            'ket' => $this->request->getPost('ket')
        ];
        // $buku_dipinjam = implode(',', $bukudipinjam);
        // $data['id_buku'] = $buku_dipinjam;
        // print_r($data);die();
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function Update($id_transaksi)
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman',
            'judul' => 'Transaksi Buku Update',
            'page' => 'v_transaksi_edit',
            'peminjaman' => $this->ModelTransaksi->DetailData($id_transaksi),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function DeleteData($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi
        ];
        $this->ModelTransaksi->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function Laporantrans()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'laporan',
            'judul' => 'Laporan',
            'page' => 'v_laporantrans',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function Laporantrans1()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'laporan',
            'judul' => 'Laporan',
            'page' => 'v_laporantrans1',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_anggota', $data);
    }
    public function VerifikasiPengembalian1($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi,
            'status1' => 'Dikembalikan',
        ];
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function VerifikasiPengembalian2($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi,
            'status2' => 'Dikembalikan',
        ];
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function VerifikasiPengembalian3($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi,
            'status3' => 'Dikembalikan',
        ];
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function VerifikasiPengembalian4($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi,
            'status4' => 'Dikembalikan',
        ];
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function VerifikasiPengembalian5($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi,
            'status5' => 'Dikembalikan',
        ];
        $this->ModelTransaksi->UpdateData($data);
        session()->setFlashdata('pesan', 'Buku Berhasil dikembalikan');
        return redirect()->to(base_url('Peminjaman'));
    }
    public function DeleteData1($id_transaksi)
    {
        $data = [
            'id_transaksi' => $id_transaksi
        ];
        $this->ModelTransaksi->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Peminjaman/index1'));
    }
    public function index1()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'pengembalian',
            'judul' => 'Peengembalian Buku',
            'page' => 'v_transaksi_kembali',
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function cetak()
    {
        $data = [
            'peminjaman' => $this->ModelTransaksi->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('cetak_view', $data);
    }
}
