<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenulis extends Model
{
    public function AllData()
    {
         return $this->db->table('tbl_penulis')
         ->orderBy('id_penulis','DESC')
         ->Get()->getResultArray();
    }
    
    //tambah data
    public function Add($data)
    {
     $this->db->table('tbl_penulis')->insert($data);
    }
 
    //detail data
    public function DetailData($id_penulis)
    {
         return $this->db->table('tbl_penulis')
         ->where('id_penulis',$id_penulis)
         ->Get()->getRowArray();
    }
    
    //update data
    public function UpdateData($data)
    {
     $this->db->table('tbl_penulis')
     ->where('id_penulis',$data['id_penulis'])
     ->update($data);
    }
    
    //delete data
    public function DeleteData($data)
    {
     $this->db->table('tbl_penulis')
     ->where('id_penulis',$data['id_penulis'])
     ->delete($data);
    }
}
