<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
   public function DataHarian($tgl)
   {
    return $this->db->table('tbl_peminjaman1')
    ->where('tbl_peminjaman1.tgl_peminjaman', $tgl)
    ->Get()->getResultArray();
   }
   public function DataBulanan($bulan, $tahun)
   {
    return $this->db->table('tbl_peminjaman1')
    ->where('MONTH(tbl_peminjaman1.tgl_peminjaman)', $bulan)
    ->where('YEAR(tbl_peminjaman1.tgl_peminjaman)', $tahun)
    ->Get()->getResultArray();
   }
}
