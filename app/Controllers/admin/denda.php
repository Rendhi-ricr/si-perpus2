<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\dendaModels;

class denda extends BaseController
{
    protected $dendaModels;
    public function __construct()
    {
        $this->dendaModels = new dendaModels();
    }
    public function index()
    {
        $denda = $this->dendaModels->findAll();
        $data = [
            'title' => 'Data Denda',
            'denda' => $denda
        ];
        return view('pages/backend/denda', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data Denda'];
        return view('pages/backend/denda/tambah', $data);
    }

    public function simpan()
    {
        $this->dendaModels->save([
            'denda' => $this->request->getVar('denda'),
        ]);
        return redirect()->to('admin/denda');
    }

    public function edit($id_denda)
    {
        $denda = $this->dendaModels->data_denda($id_denda);
        $data = [
            'title' => 'Edit Data denda',
            'denda' => $denda
        ];

        return view('pages/backend/denda/edit', $data);
    }

    public function update()
    {
        $id_denda = $this->request->getVar('id');
        $data = [
            'denda' => $this->request->getVar('denda'),
        ];
        $this->dendaModels->update_data($data, $id_denda);
        return redirect()->to('admin/denda');
    }

    public function delete($id_denda)
    {
        $this->dendaModels->delete_data($id_denda);
        return redirect()->to('admin/denda');
    }
}
