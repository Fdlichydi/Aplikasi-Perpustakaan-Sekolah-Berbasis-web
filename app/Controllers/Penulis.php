<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenulis;

class Penulis extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelPenulis = new ModelPenulis;
    }
    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'penulis',
            'judul' => 'Penulis',
            'page' => 'v_penulis',
            'penulis' => $this->ModelPenulis->AllData(),
        ];
        return view('v_template_admin',$data);
    }
    public function Add()
    {
        $data = [
            'nama_penulis'=> $this->request->getPost('nama_penulis')];
            $this->ModelPenulis->Add($data);
            session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to(base_url('penulis'));
    }
    public function UpdateData($id_penulis)
    {
        $data = [
            'id_penulis'=>$id_penulis,
            'nama_penulis'=> $this->request->getPost('nama_penulis')];
            $this->ModelPenulis->UpdateData($data);
            session()->setFlashdata('pesan','Data Berhasil Diupdate');
            return redirect()->to(base_url('penulis'));
    }
    public function DeleteData($id_penulis)
    {
        $data = [
            'id_penulis'=> $id_penulis ];
            $this->ModelPenulis->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('penulis'));
    }
}
