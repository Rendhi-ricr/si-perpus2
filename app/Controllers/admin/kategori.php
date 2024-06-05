<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\kategoriModels;

class kategori extends BaseController
{
    protected $kategoriModels;
    public function __construct()
    {
        $this->kategoriModels = new kategoriModels();
    }
    public function index()
    {
        $kategori = $this->kategoriModels->findAll();
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $kategori
        ];
        return view('pages/backend/kategori', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data Kategori'];
        return view('pages/backend/kategori/tambah', $data);
    }

    public function simpan()
    {
        $this->kategoriModels->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ]);
        return redirect()->to('admin/kategori');
    }

    public function edit($id_kategori)
    {
        $kategori = $this->kategoriModels->data_kategori($id_kategori);
        $data = [
            'title' => 'Edit Data Kategori',
            'kategori' => $kategori
        ];

        return view('pages/backend/kategori/edit', $data);
    }

    public function update()
    {
        $id_kategori = $this->request->getVar('id');
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
        ];
        $this->kategoriModels->update_data($data, $id_kategori);
        return redirect()->to('admin/kategori');
    }

    public function delete($id_kategori)
    {
        $this->kategoriModels->delete_data($id_kategori);
        return redirect()->to('admin/kategori');
    }
}
