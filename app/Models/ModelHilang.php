<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHilang extends Model
{
    //tampil data
    public function AllData()
   {
        return $this->db->table('tbl_hilang')
        ->join('tbl_buku','tbl_buku.id_buku = tbl_hilang.id_buku','left')
     //    ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_hilang.id_kelas','left')
        ->orderBy('id_hilang','DESC')
        ->Get()->getResultArray();
   }
   
   //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_hilang')->insert($data);
   }

   //detail data
   public function DetailData($id_hilang)
   {
        return $this->db->table('tbl_hilang')
        ->join('tbl_buku','tbl_buku.id_buku = tbl_hilang.id_buku','left')
     //    ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_hilang.id_kelas','left')
        ->where('id_hilang',$id_hilang)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_hilang')
    ->where('id_hilang',$data['id_hilang'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_hilang')
    ->where('id_hilang',$data['id_hilang'])
    ->delete($data);
   }
}
