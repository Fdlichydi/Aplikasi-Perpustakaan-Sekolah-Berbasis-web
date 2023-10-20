<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
         return $this->db->table('tbl_user')
         ->orderBy('id_user','DESC')
         ->Get()->getResultArray();
    }
    //tambah data
   public function Add($data)
   {
    $this->db->table('tbl_user')->insert($data);
   }

   //detail data
   public function DetailData($id_user)
   {
        return $this->db->table('tbl_user')
        ->where('id_user',$id_user)
        ->Get()->getRowArray();
   }
   
   //update data
   public function UpdateData($data)
   {
    $this->db->table('tbl_user')
    ->where('id_user', $data['id_user'])
    ->update($data);
   }
   
   //delete data
   public function DeleteData($data)
   {
    $this->db->table('tbl_user')
    ->where('id_user', $data['id_user'])
    ->delete($data);
   }
}
