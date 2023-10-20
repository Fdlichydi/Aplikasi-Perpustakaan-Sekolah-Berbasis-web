<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRak;

class Rak extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelRak = new ModelRak;
    }
    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'rak',
            'judul' => 'Rak',
            'page' => 'v_rak',
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin',$data);
    }
    public function Add()
    {
        $data = [
            'nama_rak'=> $this->request->getPost('nama_rak'),
        ];
            $this->ModelRak->Add($data);
            session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Rak'));
    }
    public function UpdateData($id_rak)
    {
        $data = [
            'id_rak'=>$id_rak,
            'nama_rak'=> $this->request->getPost('nama_rak'),];
            $this->ModelRak->UpdateData($data);
            session()->setFlashdata('pesan','Data Berhasil Diupdate');
            return redirect()->to(base_url('rak'));
    }
    public function DeleteData($id_rak)
    {
        $data = [
            'id_rak'=> $id_rak ];
            $this->ModelRak->DeleteData($data);
            session()->setFlashdata('pesan','Data Berhasil Dihapus');
            return redirect()->to(base_url('rak'));
    }
}
