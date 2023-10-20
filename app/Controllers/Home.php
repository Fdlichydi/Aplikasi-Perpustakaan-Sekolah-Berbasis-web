<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelKategori;
use App\Models\ModelPenerbit;
use App\Models\ModelPenulis;
use App\Models\ModelRak;

class Home extends BaseController
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
            'judul' => 'Home',
            'page' => 'v_home',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template',$data);
    }
    public function Aturan()
    {
        $data = [
            'judul' => 'Aturan Dan Ketentuan Perpustakaan SMA Negeri 1 Nan Sabaris',
            'page' => 'v_aturan',

        ];
        return view('v_template',$data);
    }
}
