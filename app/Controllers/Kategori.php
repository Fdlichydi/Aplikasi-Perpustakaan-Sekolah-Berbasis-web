<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKategori = new ModelKategori;
    }
    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'kategori',
            'judul' => 'Kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template_admin',$data);
    }
    public function Add()
    {
        $data = [
            'nama_kategori'=> $this->request->getPost('nama_kategori')];
            $this->ModelKategori->Add($data);
            session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Kategori'));
    }
    public function UpdateData($id_kategori)
    {
        $data = [
            'id_kategori'=>$id_kategori,
            'nama_kategori'=> $this->request->getPost('nama_kategori')];
            $this->ModelKategori->UpdateData($data);
            session()->setFlashdata('pesan','Data Berhasil Diupdate');
            return redirect()->to(base_url('Kategori'));
    }
    public function DeleteData($id_kategori)
    {
        $data = [
            'id_kategori'=> $id_kategori ];
            $this->ModelKategori->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('Kategori'));
    }
}
