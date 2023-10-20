<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksiKembali extends Model
{
    public function AllData()
    {
         return $this->db->table('tbl_transaksi_kembali')
         ->join('tbl_transaksi','tbl_transaksi.nama_siswa = tbl_transaksi_kembali.nama_siswa','left')
        //  ->join('tbl_buku','tbl_buku.id_buku = tbl_transaksi_kembali.id_buku','left')
         ->orderBy('id_transaksi_kembali','DESC')
         ->Get()->getResultArray();
    }
    
    //tambah data
    public function Add($data)
    {
     $this->db->table('tbl_transaksi_kembali')->insert($data);
    }
 
    //detail data
    public function DetailData($id_transaksi_kembali)
    {
         return $this->db->table('tbl_transaksi_kembali')
     //     ->join('tbl_transaksi_kembali','tbl_transaksi_kembali.id_kelas = tbl_transaksi_kembali.id_kelas','left')
        //  ->join('tbl_buku','tbl_buku.id_buku = tbl_transaksi_kembali.id_buku','left')
         ->where('id_transaksi_kembali',$id_transaksi_kembali)
         ->Get()->getRowArray();
    }
    
    //update data
    public function UpdateData($data)
    {
     $this->db->table('tbl_transaksi_kembali')
     ->where('id_transaksi_kembali',$data['id_transaksi_kembali'])
     ->update($data);
    }
    
    //delete data
    public function DeleteData($data)
    {
     $this->db->table('tbl_transaksi_kembali')
     ->where('id_transaksi_kembali',$data['id_transaksi_kembali'])
     ->delete($data);
    }
    
}
