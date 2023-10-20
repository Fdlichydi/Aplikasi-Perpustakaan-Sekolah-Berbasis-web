<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function totalbuku()
    {
        return $this->db->table('tbl_buku')->countAll();
    }
    public function totaltransaksi()
    {
        return $this->db->table('tbl_pinjam')->countAll();
    }
    public function totalbukuhilang()
    {
        return $this->db->table('tbl_hilang')->countAll();
    }
    public function totaldenda()
    {
        return $this->db->table('tbl_denda')->countAll();
    }
}
