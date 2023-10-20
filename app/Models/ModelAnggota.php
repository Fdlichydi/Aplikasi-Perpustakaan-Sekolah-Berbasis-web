<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    //tampil data
    public function AllData()
    {
         return $this->db->table('tbl_anggota')
         ->orderBy('id_anggota','DESC')
         ->Get()->getResultArray();
    }
    //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_anggota')->insert($data);
   }

   //detail data
   public function DetailData($id_anggota)
   {
        return $this->db->table('tbl_anggota')
        ->where('id_anggota',$id_anggota)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_anggota')
    ->where('id_anggota',$data['id_anggota'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_anggota')
    ->where('id_anggota',$data['id_anggota'])
    ->delete($data);
   }
}
