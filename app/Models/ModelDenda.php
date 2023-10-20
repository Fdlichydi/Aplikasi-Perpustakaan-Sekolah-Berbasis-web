<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDenda extends Model
{
    //tampil data
    public function AllData()
   {
        return $this->db->table('tbl_denda')
        ->orderBy('id_denda','DESC')
        ->Get()->getResultArray();
   }
   
   //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_denda')->insert($data);
   }

   //detail data
   public function DetailData($id_denda)
   {
        return $this->db->table('tbl_denda')
        ->where('id_denda',$id_denda)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_denda')
    ->where('id_denda',$data['id_denda'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_denda')
    ->where('id_denda',$data['id_denda'])
    ->delete($data);
   }
}
