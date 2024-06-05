<?php

namespace App\Models;

use CodeIgniter\Model;

class anggotaModels extends Model
{
    protected $table      = 'tbl_anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['nama_anggota', 'alamat_anggota', 'nis_nisn', 'no_telp_anggota'];

    public function data_anggota($id_anggota)
    {
        return $this->find($id_anggota);
    }
    public function update_data($data, $id_anggota)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_anggota' => $id_anggota)
        );
        return $query;
    }
    public function delete_data($id_anggota)
    {
        $query = $this->db->table($this->table)->delete(array('id_anggota' => $id_anggota));
        return $query;
    }
}
