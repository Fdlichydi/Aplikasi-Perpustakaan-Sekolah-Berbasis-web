<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
     public function AllData()
     {
          return $this->db->table('tbl_buku')
               ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
               ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
               ->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_buku.id_penulis', 'left')
               ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
               ->orderBy('id_buku', 'DESC')
               ->Get()->getResultArray();
     }
     //tambah data
     public function Add($data)
     {
          $this->db->table('tbl_buku')->insert($data);
     }

     //detail data
     public function DetailData($id_buku)
     {
          return $this->db->table('tbl_buku')
               ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
               ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
               ->join('tbl_penulis', 'tbl_penulis.id_penulis = tbl_buku.id_penulis', 'left')
               ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
               ->where('id_buku', $id_buku)
               ->Get()->getRowArray();
     }

     //update data
     public function UpdateData($data)
     {
          $this->db->table('tbl_buku')
               ->where('id_buku', $data['id_buku'])
               ->update($data);
     }

     //delete data
     public function DeleteData($data)
     {
          $this->db->table('tbl_buku')
               ->where('id_buku', $data['id_buku'])
               ->delete($data);
     }
}
