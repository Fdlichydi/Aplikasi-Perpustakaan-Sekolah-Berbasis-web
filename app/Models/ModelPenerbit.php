<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{
    public function AllData()
    {
         return $this->db->table('tbl_penerbit')
         ->orderBy('id_penerbit','DESC')
         ->Get()->getResultArray();
    }
    
    //tambah data
    public function Add($data)
    {
     $this->db->table('tbl_penerbit')->insert($data);
    }
 
    //detail data
    public function DetailData($id_penerbit)
    {
         return $this->db->table('tbl_penerbit')
         ->where('id_penerbit',$id_penerbit)
         ->Get()->getRowArray();
    }
    
    //update data
    public function UpdateData($data)
    {
     $this->db->table('tbl_penerbit')
     ->where('id_penerbit',$data['id_penerbit'])
     ->update($data);
    }
    
    //delete data
    public function DeleteData($data)
    {
     $this->db->table('tbl_penerbit')
     ->where('id_penerbit',$data['id_penerbit'])
     ->delete($data);
    }
}
