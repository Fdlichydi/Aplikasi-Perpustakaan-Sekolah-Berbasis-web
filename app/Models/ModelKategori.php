<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    //tampil data
    public function AllData()
   {
        return $this->db->table('tbl_kategori')
        ->orderBy('id_kategori','DESC')
        ->Get()->getResultArray();
   }
   
   //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_kategori')->insert($data);
   }

   //detail data
   public function DetailData($id_kategori)
   {
        return $this->db->table('tbl_kategori')
        ->where('id_kategori',$id_kategori)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_kategori')
    ->where('id_kategori',$data['id_kategori'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_kategori')
    ->where('id_kategori',$data['id_kategori'])
    ->delete($data);
   }
}
