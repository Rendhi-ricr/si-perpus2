<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\bukuModels;
use App\Models\kategoriModels;
use App\Models\rakModels;

class Buku extends BaseController

{
    protected $bukuModels, $kategoriModels, $rakModels;
    public function __construct()
    {
        $this->buku = new bukuModels();
        $this->kategori = new kategoriModels();
        $this->rak = new rakModels();
    }
    public function index()
    {

        $data['Buku'] = $this->buku->getAll();
        return view('pages/backend/buku', $data);
    }

    public function tambah()
    {
        $data = [
            'Kategori' => $this->kategori->findAll(),
            'Rak' => $this->rak->findAll(),
        ];

        return view('pages/backend/buku/tambah', $data);
    }
    public function simpan()
    {
        $validationRule = [
            'cover' => [
                'label' => 'Image File',
                'rules' => [
                    // aturan dari file yang akan diupload
                    'uploaded[cover]',
                    'is_image[cover]',

                    // ekstensi yang diperbolehkan ketika upload file
                    'mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];


        $cover = $this->request->getFile('cover');


        if ($cover->getFilename() != null) {
            // jika file nya tidak null atau kosong ( empty )
            if (!$this->validate($validationRule)) {

                // tampil pesan error
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            }

            // jika file nya ada dan inputkan
            // memindahkan file ke folder yang di tentukan
            if (!$cover->hasMoved()) {

                // ngambil nama file
                $fileName = $cover->getName();

                // echo $fileName;
                // mindahin file ke folder public/img/berita
                $cover->move(ROOTPATH . 'public/img/cover_buku', $fileName);
            } else {

                //echo $fileName;
                return redirect()->back()->with('errors', 'File sudah di pindahkan!');
            }
        }
        $id_kategori = $this->request->getVar('id_kategori');
        $id_rak = $this->request->getVar('id_rak');
        $this->buku->save([
            'judul' => $this->request->getVar('judul_buku'),
            'pengarang'  => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'ringkasan_buku' => $this->request->getVar('ringkasan_buku'),
            'jumlah_salinan_tersedia' => $this->request->getVar('jumlah_salinan_tersedia'),
            'cover_buku' => $fileName,
            'id_kategori' => $id_kategori,
            'id_rak'    => $id_rak,
        ]);
        return redirect()->to('admin/buku');
    }

    public function edit($id_buku)
    {
        $buku = $this->buku->data_buku($id_buku);
        $kategori = $this->kategori->findAll();
        $rak = $this->rak->findAll();
        $data = [
            'title' => 'Edit Data Buku',
            'Buku' => $buku,
            'Kategori' => $kategori,
            'Rak' => $rak,
        ];

        return view('pages/backend/buku/edit', $data);
    }

    public function update()
    {
        $validationRule = [
            'cover' => [
                'label' => 'Image File',
                'rules' => [
                    // aturan dari file yang akan diupload
                    'uploaded[cover]',
                    'is_image[cover]',

                    // ekstensi yang diperbolehkan ketika upload file
                    'mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];

        $id_buku = $this->request->getVar('id');
        $cover = $this->request->getFile('cover');

        $data = [
            'judul' => $this->request->getVar('judul_buku'),
            'pengarang'  => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'ringkasan_buku' => $this->request->getVar('ringkasan_buku'),
            'jumlah_salinan_tersedia' => $this->request->getVar('jumlah_salinan_tersedia'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_rak' => $this->request->getVar('id_rak'),
        ];
        if ($cover->getFilename() != null) {
            // jika file nya tidak null atau kosong ( empty )
            if (!$this->validate($validationRule)) {

                // tampil pesan error
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            }
            $fileLama = $this->buku->find($id_buku)['cover_buku'];
            $filePath = ROOTPATH . 'public/img/cover_buku/' . $fileLama;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // jika file nya ada dan inputkan
            // memindahkan file ke folder yang di tentukan
            if (!$cover->hasMoved()) {

                // ngambil nama file
                $fileName = $cover->getName();


                // echo $fileName;
                // mindahin file ke folder public/img/berita
                $cover->move(ROOTPATH . 'public/img/cover_buku', $fileName);
            } else {

                //echo $fileName;
                return redirect()->back()->with('errors', 'File sudah di pindahkan!');
            }
            $data = [
                'judul' => $this->request->getVar('judul_buku'),
                'pengarang'  => $this->request->getVar('pengarang'),
                'penerbit' => $this->request->getVar('penerbit'),
                'tahun_terbit' => $this->request->getVar('tahun_terbit'),
                'ringkasan_buku' => $this->request->getVar('ringkasan_buku'),
                'jumlah_salinan_tersedia' => $this->request->getVar('jumlah_salinan_tersedia'),
                'cover_buku' => $fileName,
                'id_kategori' => $this->request->getVar('id_kategori'),
                'id_rak' => $this->request->getVar('id_rak')
            ];
        }

        $this->buku->update_data($data, $id_buku);
        return redirect()->to('admin/buku');
    }


    public function delete($id_buku)
    {
        $buku = $this->buku->data_buku($id_buku);

        // nama file yang berada dikolom userfile
        $file = $buku['cover_buku'];

        // proses penghapusan file menggunakan fungsi unlink
        unlink('../public/img/cover_buku/' . $file);

        // penghapusan database
        $this->buku->delete_data($id_buku);

        // mengakses halaman berita
        return redirect()->to('admin/buku');
    }
}
