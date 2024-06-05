<?php

namespace App\Models;

use CodeIgniter\Model;

class dendaModels extends Model
{
    protected $table = 'tbl_denda';
    protected $primaryKey = 'id_denda';
    protected $allowedFields = ['denda'];

    public function data_denda($id_denda)
    {
        return $this->find($id_denda);
    }
    public function update_data($data, $id_denda)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_denda' => $id_denda)
        );
        return $query;
    }
    public function delete_data($id_denda)
    {
        $query = $this->db->table($this->table)->delete(array('id_denda' => $id_denda));
        return $query;
    }
}
