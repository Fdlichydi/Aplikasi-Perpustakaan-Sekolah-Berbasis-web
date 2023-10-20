<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDenda;
use App\Models\ModelKelas;

class Denda extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelDenda = new ModelDenda;
        $this->ModelKelas = new ModelKelas;
    }
    public function index()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'denda',
            'judul' => 'Denda',
            'page' => 'v_denda',
            'denda' => $this->ModelDenda->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin',$data);
    }
    public function index1()
    {
        $data = [
            'menu' => 'transaksi',
            'submenu' => 'denda',
            'judul' => 'Denda',
            'page' => 'v_denda1',
            'denda' => $this->ModelDenda->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_anggota',$data);
    }
    public function Add()
    {
        $data = [
            'tgl_denda'=> $this->request->getPost('tgl_denda'),
            'nama'=> $this->request->getPost('nama'),
            'kelas'=> $this->request->getPost('kelas'),
            'denda'=> $this->request->getPost('denda'),
            'ket'=> $this->request->getPost('ket'),
        ];
            $this->ModelDenda->Add($data);
            session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Denda'));
    }
    public function UpdateData($id_denda)
    {
        $data = [
            'id_denda'=>$id_denda,
            'tgl_denda'=> $this->request->getPost('tgl_denda'),
            'nama'=> $this->request->getPost('nama'),
            'kelas'=> $this->request->getPost('kelas'),
            'denda'=> $this->request->getPost('denda'),
            'ket'=> $this->request->getPost('ket'),    
        ];
            $this->ModelDenda->UpdateData($data);
            session()->setFlashdata('pesan','Data Berhasil Diupdate');
            return redirect()->to(base_url('Denda'));
    }
    public function DeleteData($id_denda)
    {
        $data = [
            'id_denda'=> $id_denda ];
            $this->ModelDenda->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('Denda'));
    }
    public function Laporanden()
    {
        $data = [
            'menu' => 'laporan',
            'submenu' => 'laporanden',
            'judul' => 'Laporan Denda',
            'page' => 'v_laporanden',
            'denda' => $this->ModelDenda->AllData(),
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_laporanden', $data);
    }
}
