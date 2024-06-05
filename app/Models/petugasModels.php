<?php

namespace App\Models;

use CodeIgniter\Model;

class petugasModels extends Model
{
    protected $table = 'tbl_petugas';
    protected $primaryKey = 'id_petugas';
    protected $allowedFields = ['nama_petugas', 'foto_petugas', 'email', 'no_hp'];

    public function data_petugas($id_petugas)
    {
        return $this->find($id_petugas);
    }
    public function update_data($data, $id_petugas)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_petugas' => $id_petugas)
        );
        return $query;
    }
    public function delete_data($id_petugas)
    {
        $query = $this->db->table($this->table)->delete(array('id_petugas' => $id_petugas));
        return $query;
    }
}
