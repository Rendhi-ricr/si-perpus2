<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\anggotaModels;

class anggota extends BaseController

{
    protected $anggotaModels;
    public function __construct()
    {
        $this->anggotaModels = new anggotaModels();
    }
    public function index()
    {
        $anggota = $this->anggotaModels->findAll();
        $data = [
            'title' => 'Data anggota',
            'anggota' => $anggota
        ];
        return view('pages/backend/anggota', $data);
    }

    public function tambah()
    {
        $data = ['title' => 'Tambah Data anggota'];
        return view('pages/backend/anggota/tambah', $data);
    }
    public function simpan()
    {
        // $validationRule = [
        //     'foto_anggota' => [
        //         'label' => 'Image File',
        //         'rules' => [
        //             // aturan dari file yang akan diupload
        //             'uploaded[foto_anggota]',
        //             'is_image[foto_anggota]',

        //             // ekstensi yang diperbolehkan ketika upload file
        //             'mime_in[foto_anggota,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
        //         ],
        //     ],
        // ];


        // $foto_anggota = $this->request->getFile('foto_anggota');


        // if ($foto_anggota->getFilename() != null) {
        //     // jika file nya tidak null atau kosong ( empty )
        //     if (!$this->validate($validationRule)) {

        //         // tampil pesan error
        //         return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        //     }

        //     // jika file nya ada dan inputkan
        //     // memindahkan file ke folder yang di tentukan
        //     if (!$foto_anggota->hasMoved()) {

        //         // ngambil nama file
        //         $fileName = $foto_anggota->getName();

        //         // echo $fileName;
        //         // mindahin file ke folder public/img/berita
        //         $foto_anggota->move(ROOTPATH . 'public/img/anggota', $fileName);
        //     } else {

        //         //echo $fileName;
        //         return redirect()->back()->with('errors', 'File sudah di pindahkan!');
        //     }
        // }
        $this->anggotaModels->save([
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            // 'foto_anggota' => $fileName,
            'alamat_anggota' => $this->request->getVar('alamat_anggota'),
            'nis_nisn' => $this->request->getVar('nis_nisn'),
            'no_telp_anggota' => $this->request->getVar('no_telp_anggota'),
        ]);
        return redirect()->to('admin/anggota');
    }

    public function edit($id_anggota)
    {
        $anggota = $this->anggotaModels->data_anggota($id_anggota);
        $data = [
            'title' => 'Edit Data Anggota',
            'anggota' => $anggota,
        ];

        return view('pages/backend/anggota/edit', $data);
    }

    public function update()
    {


        $id_anggota = $this->request->getVar('id');
        $data = [
            'nama_anggota' => $this->request->getVar('nama_anggota'),
            // 'foto_anggota' => $fileName,
            'alamat_anggota' => $this->request->getVar('alamat_anggota'),
            'nis_nisn' => $this->request->getVar('nis_nisn'),
            'no_telp_anggota' => $this->request->getVar('no_telp_anggota'),
        ];
        $this->anggotaModels->update_data($data, $id_anggota);
        return redirect()->to('admin/anggota');
    }

    public function delete($id_anggota)
    {
        // $anggota = $this->anggotaModels->data_anggota($id_anggota);

        // // nama file yang berada dikolom userfile
        // $file = $anggota['foto_anggota'];

        // // proses penghapusan file menggunakan fungsi unlink
        // unlink('../public/img/anggota/' . $file);

        // penghapusan database
        $this->anggotaModels->delete_data($id_anggota);

        // mengakses halaman berita
        return redirect()->to('admin/anggota');
    }
}
