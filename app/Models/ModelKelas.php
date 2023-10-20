<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    //tampil data
    public function AllData()
   {
        return $this->db->table('tbl_kelas')
        ->orderBy('id_kelas','DESC')
        ->Get()->getResultArray();
   }
   
   //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_kelas')->insert($data);
   }

   //detail data
   public function DetailData($id_kelas)
   {
        return $this->db->table('tbl_kelas')
        ->where('id_kelas',$id_kelas)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_kelas')
    ->where('id_kelas',$data['id_kelas'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_kelas')
    ->where('id_kelas',$data['id_kelas'])
    ->delete($data);
   }
}
