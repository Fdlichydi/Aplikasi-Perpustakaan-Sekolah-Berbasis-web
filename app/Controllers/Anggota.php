<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
    }
    public function index()
    {
        $data = [
            'menu' => 'anggota',
            'submenu' => 'anggota',
            'judul' => 'Anggota',
            'page' => 'v_anggota',
            'anggota' => $this->ModelAnggota->AllData(),
        ];
        return view('v_template_admin',$data);
    }
    public function Add()
    {
        $data = [
            'nis'=> $this->request->getPost('nis'),
            'nama'=> $this->request->getPost('nama'),
            'no_hp'=> $this->request->getPost('no_hp'),
        ];
            $this->ModelAnggota->Add($data);
            session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Anggota'));
    }
    public function UpdateData($id_anggota)
    {
        $data = [
            'id_anggota'=>$id_anggota,
            'nis'=> $this->request->getPost('nis'),
            'nama'=> $this->request->getPost('nama'),
            'no_hp'=> $this->request->getPost('no_hp'),
        ];
            $this->ModelAnggota->UpdateData($data);
            session()->setFlashdata('pesan','Data Berhasil Diupdate');
            return redirect()->to(base_url('Anggota'));
    }
    public function DeleteData($id_anggota)
    {
        $data = [
            'id_anggota'=> $id_anggota ];
            $this->ModelAnggota->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('Anggota'));
    }
}
