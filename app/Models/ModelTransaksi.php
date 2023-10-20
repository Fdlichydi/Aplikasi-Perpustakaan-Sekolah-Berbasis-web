<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    public function AllData()
    {
         return $this->db->table('tbl_transaksi')
         ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_transaksi.id_kelas','left')
        //  ->join('tbl_buku','tbl_buku.id_buku = tbl_transaksi.id_buku','left')
         ->orderBy('id_transaksi','DESC')
         ->Get()->getResultArray();
    }
    
    //tambah data
    public function Add($data)
    {
     $this->db->table('tbl_transaksi')->insert($data);
    }
 
    //detail data
    public function DetailData($id_transaksi)
    {
         return $this->db->table('tbl_transaksi')
         ->join('tbl_kelas','tbl_kelas.id_kelas = tbl_transaksi.id_kelas','left')
        //  ->join('tbl_buku','tbl_buku.id_buku = tbl_transaksi.id_buku','left')
         ->where('id_transaksi',$id_transaksi)
         ->Get()->getRowArray();
    }
    
    //update data
    public function UpdateData($data)
    {
     $this->db->table('tbl_transaksi')
     ->where('id_transaksi',$data['id_transaksi'])
     ->update($data);
    }
    
    //delete data
    public function DeleteData($data)
    {
     $this->db->table('tbl_transaksi')
     ->where('id_transaksi',$data['id_transaksi'])
     ->delete($data);
    }
    
}
