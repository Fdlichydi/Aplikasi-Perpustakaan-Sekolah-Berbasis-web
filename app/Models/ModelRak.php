<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{
    //tampil data
    public function AllData()
    {
         return $this->db->table('tbl_rak')
         ->orderBy('id_rak','DESC')
         ->Get()->getResultArray();
    }
    //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_rak')->insert($data);
   }

   //detail data
   public function DetailData($id_rak)
   {
        return $this->db->table('tbl_rak')
        ->where('id_rak',$id_rak)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_rak')
    ->where('id_rak',$data['id_rak'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_rak')
    ->where('id_rak',$data['id_rak'])
    ->delete($data);
   }
}
