<?php

namespace App\Models;

use CodeIgniter\Model;

class kategoriModels extends Model
{
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];


    public function data_kategori($id_kategori)
    {
        return $this->find($id_kategori);
    }
    public function update_data($data, $id_kategori)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_kategori' => $id_kategori)
        );
        return $query;
    }
    public function delete_data($id_kategori)
    {
        $query = $this->db->table($this->table)->delete(array('id_kategori' => $id_kategori));
        return $query;
    }
}
