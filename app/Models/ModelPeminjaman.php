<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    //tampil data
    public function AllData()
    {
         return $this->db->table('tbl_pinjam')
         ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_pinjam.id_kelas','left')
         ->join('tbl_buku','tbl_buku.id_buku = tbl_pinjam.id_buku','left')
         ->orderBy('id_pinjam','DESC')
         ->Get()->getResultArray();
    }
    //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_pinjam')->insert($data);
   }

   //detail data
   public function DetailData($id_pinjam)
   {
        return $this->db->table('tbl_pinjam')
        ->where('id_pinjam',$id_pinjam)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_pinjam')
    ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_pinjam.id_kelas','left')
    ->join('tbl_buku','tbl_buku.id_buku = tbl_pinjam.id_buku','left')
    ->where('id_pinjam',$data['id_pinjam'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_pinjam')
    ->where('id_pinjam',$data['id_pinjam'])
    ->delete($data);
   }
}
