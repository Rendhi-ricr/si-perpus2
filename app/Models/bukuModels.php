<?php

namespace App\Models;

use CodeIgniter\Model;

class bukuModels extends Model
{
    protected $table = 'tbl_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['cover_buku', 'judul', 'pengarang', 'penerbit', 'tahun_terbit', 'ringkasan_buku', 'jumlah_salinan_tersedia', 'id_kategori', 'id_rak'];


    function getAll()
    {
        $builder = $this->db->table('tbl_buku');
        $builder->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
        $query = $builder->get();
        return $query->getResult();
    }

    public function data_buku($id_buku)
    {
        return $this->find($id_buku);
    }
    public function update_data($data, $id_buku)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_buku' => $id_buku)
        );
        return $query;
    }
    public function delete_data($id_buku)
    {
        $query = $this->db->table($this->table)->delete(array('id_buku' => $id_buku));
        return $query;
    }
}
