<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function LoginAdmin($email, $password)
    {
        return $this->db->table('tbl_user')
        ->where([
            'email' => $email,
            'password' => $password,
        ])->get()->getRowArray();
    }
    public function LoginAnggota($nis, $password)
    {
        return $this->db->table('tbl_anggota')
        ->where([
            'nis' => $nis,
            'password' => $password,
        ])->get()->getRowArray();
    }
    public function Daftar($data)
    {
        $this->db->table('tbl_anggota')->insert($data);
    }
}
