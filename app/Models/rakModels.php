<?php

namespace App\Models;

use CodeIgniter\Model;

class rakModels extends Model
{
    protected $table = 'tbl_rak';
    protected $primaryKey = 'id_rak';
    protected $allowedFields = ['nama_rak'];

    public function data_rak($id_rak)
    {
        return $this->find($id_rak);
    }
    public function update_data($data, $id_rak)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_rak' => $id_rak)
        );
        return $query;
    }
    public function delete_data($id_rak)
    {
        $query = $this->db->table($this->table)->delete(array('id_rak' => $id_rak));
        return $query;
    }
}
