<?php

namespace App\Controllers;
use App\Models\ModelAdmin;


class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin;
    }
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => ' ',
            'judul' => 'Dashboard',
            'page' => 'v_admin',
            'totalbuku' => $this->ModelAdmin->totalbuku(),
            'totalpeminjaman1' => $this->ModelAdmin->totaltransaksi(),
            'totalhilang' => $this->ModelAdmin->totalbukuhilang(),
            'totalden' => $this->ModelAdmin->totaldenda(),
           
        ];
        return view('v_template_admin',$data);
    }
    public function index1()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => ' ',
            'judul' => 'Dashboard',
            'page' => 'v_admin',
            'totalbuku' => $this->ModelAdmin->totalbuku(),
            'totalpeminjaman1' => $this->ModelAdmin->totaltransaksi(),
            'totalhilang' => $this->ModelAdmin->totalbukuhilang(),
            'totalden' => $this->ModelAdmin->totaldenda(),
           
        ];
        return view('v_template_anggota',$data);
    }
}
