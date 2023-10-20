<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeminjaman;
use App\Models\ModelKelas;
use App\Models\ModelBuku;

class Peminjaman1 extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelPeminjaman = new ModelPeminjaman;
        $this->ModelKelas = new ModelKelas;
        $this->ModelBuku = new ModelBuku;
    }
    public function index()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman1',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_peminjaman',
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function index1()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman1',
            'judul' => 'Peminjaman Buku',
            'page' => 'v_peminjaman1',
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_anggota', $data);
    }
    public function Pengembalian()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman2',
            'judul' => 'Pengembalian Buku',
            'page' => 'v_transaksi',
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function Pengembalian1()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman2',
            'judul' => 'Pengembalian Buku',
            'page' => 'v_transaksi1',
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_anggota', $data);
    }
    public function Add()
    {
        $data = [
            'tgl_pinjam' => date('d F Y'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_buku' => $this->request->getPost('id_buku'),
            'no' => $this->request->getPost('no'),
            'jumlah' => '1',
            'status' => 'Pinjam',
        ];
        // $buku_dipinjam = implode(',', $bukudipinjam);
        // $data['id_buku'] = $buku_dipinjam;
        // print_r($data);die();
        $this->ModelPeminjaman->Add($data);
        session()->setFlashdata('pesan', 'Peminjaman Berhasil di Tambahkan');
        return redirect()->to(base_url('Peminjaman1'));
    }
    public function Edit($id_pinjam)
    {
        // $bukudipinjam = $this->request->getPost('id_buku');
        $data = [
            'id_pinjam' => $id_pinjam,
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'nama' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'id_buku' => $this->request->getPost('id_buku'),
            'no' => $this->request->getPost('no'),
        ];
        
        $this->ModelPeminjaman->UpdateData($data);
        session()->setFlashdata('pesan', 'Transaksi Berhasil Diupdate');
        return redirect()->to(base_url('Peminjaman1'));
    }
    public function Update($id_pinjam)
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'peminjaman1',
            'judul' => 'Edit Peminjaman',
            'page' => 'v_peminjaman_edit',
            'peminjaman' => $this->ModelPeminjaman->DetailData($id_pinjam),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function DeleteData($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam
        ];
        $this->ModelPeminjaman->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Peminjaman1'));
    }

    public function DeleteData1($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam
        ];
        $this->ModelPeminjaman->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Peminjaman1/Pengembalian'));
    }

    public function VerifikasiPengembalian($id_pinjam)
    {
        $data = [
            'id_pinjam' => $id_pinjam,
            'tgl_kembali' => date('d F Y'),
            'status' => 'Kembali',
        ];
        $this->ModelPeminjaman->UpdateData($data);
        session()->setFlashdata('pesan', 'Buku Dikembalikan');
        return redirect()->to(base_url('Peminjaman1/Pengembalian'));
    }
    public function Laporantrans()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'laporantrans',
            'judul' => 'Laporan Peminjaman Buku',
            'page' => 'v_laporantrans',
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function cetak()
    {
        $data = [
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('cetak_view', $data);
    }

    public function cetak1()
    {
        $data = [
            'peminjaman' => $this->ModelPeminjaman->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('cetak_view1', $data);
    }
}
