<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\rakModels;

class rak extends BaseController
{
    protected $rakModels;
    public function __construct()
    {
        $this->rakModels = new rakModels();
    }
    public function index()
    {
        $rak = $this->rakModels->findAll();
        $data = [
            'title' => 'Data rak',
            'rak' => $rak
        ];
        return view('pages/backend/rak', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data rak'];
        return view('pages/backend/rak/tambah', $data);
    }

    public function simpan()
    {
        $this->rakModels->save([
            'nama_rak' => $this->request->getVar('nama_rak'),
        ]);
        return redirect()->to('admin/rak');
    }

    public function edit($id_rak)
    {
        $rak = $this->rakModels->data_rak($id_rak);
        $data = [
            'title' => 'Edit Data rak',
            'rak' => $rak
        ];

        return view('pages/backend/rak/edit', $data);
    }

    public function update()
    {
        $id_rak = $this->request->getVar('id');
        $data = [
            'nama_rak' => $this->request->getVar('nama_rak'),
        ];
        $this->rakModels->update_data($data, $id_rak);
        return redirect()->to('admin/rak');
    }

    public function delete($id_rak)
    {
        $this->rakModels->delete_data($id_rak);
        return redirect()->to('admin/rak');
    }
}
