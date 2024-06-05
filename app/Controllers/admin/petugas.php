<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\petugasModels;

class petugas extends BaseController

{
    protected $petugasModels;
    public function __construct()
    {
        $this->petugasModels = new petugasModels();
    }
    public function index()
    {
        $petugas = $this->petugasModels->findAll();
        $data = [
            'title' => 'Data Petugas',
            'petugas' => $petugas
        ];
        return view('pages/backend/petugas', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data petugas'];
        return view('pages/backend/petugas/tambah', $data);
    }
    public function simpan()
    {
        $validationRule = [
            'foto_petugas' => [
                'label' => 'Image File',
                'rules' => [
                    // aturan dari file yang akan diupload
                    'uploaded[foto_petugas]',
                    'is_image[foto_petugas]',

                    // ekstensi yang diperbolehkan ketika upload file
                    'mime_in[foto_petugas,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];


        $foto_petugas = $this->request->getFile('foto_petugas');


        if ($foto_petugas->getFilename() != null) {
            // jika file nya tidak null atau kosong ( empty )
            if (!$this->validate($validationRule)) {

                // tampil pesan error
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            }

            // jika file nya ada dan inputkan
            // memindahkan file ke folder yang di tentukan
            if (!$foto_petugas->hasMoved()) {

                // ngambil nama file
                $fileName = $foto_petugas->getName();

                // echo $fileName;
                // mindahin file ke folder public/img/berita
                $foto_petugas->move(ROOTPATH . 'public/img/petugas', $fileName);
            } else {

                //echo $fileName;
                return redirect()->back()->with('errors', 'File sudah di pindahkan!');
            }
        }
        $this->petugasModels->save([
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'foto_petugas' => $fileName,
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
        ]);
        return redirect()->to('admin/petugas');
    }

    public function edit($id_petugas)
    {
        $petugas = $this->petugasModels->data_petugas($id_petugas);
        $data = [
            'title' => 'Edit Data agenda',
            'petugas' => $petugas
        ];

        return view('pages/backend/petugas/edit', $data);
    }

    public function update()
    {
        $validationRule = [
            'foto_petugas' => [
                'label' => 'Image File',
                'rules' => [
                    // aturan dari file yang akan diupload
                    'uploaded[foto_petugas]',
                    'is_image[foto_petugas]',

                    // ekstensi yang diperbolehkan ketika upload file
                    'mime_in[foto_petugas,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];

        $id_petugas = $this->request->getVar('id');
        $foto_petugas = $this->request->getFile('foto_petugas');

        $data = [
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
        ];
        if ($foto_petugas->getFilename() != null) {
            // jika file nya tidak null atau kosong ( empty )
            if (!$this->validate($validationRule)) {

                // tampil pesan error
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            }
            $fileLama = $this->petugasModels->find($id_petugas)['foto_petugas'];
            $filePath = ROOTPATH . 'public/img/petugas/' . $fileLama;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // jika file nya ada dan inputkan
            // memindahkan file ke folder yang di tentukan
            if (!$foto_petugas->hasMoved()) {

                // ngambil nama file
                $fileName = $foto_petugas->getName();


                // echo $fileName;
                // mindahin file ke folder public/img/berita
                $foto_petugas->move(ROOTPATH . 'public/img/petugas', $fileName);
            } else {

                //echo $fileName;
                return redirect()->back()->with('errors', 'File sudah di pindahkan!');
            }
            $data = [
                'nama_petugas' => $this->request->getVar('nama_petugas'),
                'foto_petugas' => $fileName,
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
            ];
        }

        $this->petugasModels->update_data($data, $id_petugas);
        return redirect()->to('admin/petugas');
    }

    public function delete($id_petugas)
    {
        $petugas = $this->petugasModels->data_petugas($id_petugas);

        // nama file yang berada dikolom userfile
        $file = $petugas['foto_petugas'];

        // proses penghapusan file menggunakan fungsi unlink
        unlink('../public/img/petugas/' . $file);

        // penghapusan database
        $this->petugasModels->delete_data($id_petugas);

        // mengakses halaman berita
        return redirect()->to('admin/petugas');
    }
}
