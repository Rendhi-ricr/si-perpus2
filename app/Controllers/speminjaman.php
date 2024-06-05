<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\speminjamanModels;
use App\Models\anggotaModels;
use App\Models\bukuModels;
use App\Models\transaksiModels;
use App\Models\dendaModels;




class speminjaman extends BaseController
{
    public function index()
    {
        $transaksiModels = new transaksiModels();
        $anggotaModels = new anggotaModels();
        $speminjamanModel = new speminjamanModels();
        $bukuModels = new bukuModels();
        $dendaModels = new dendaModels();

        // Ambil data transaksi
        $transaksi = $transaksiModels->findAll();

        // Buat array kosong untuk menyimpan data yang akan ditampilkan
        $data = [];

        // Loop melalui setiap transaksi
        foreach ($transaksi as $trx) {
            // Ambil data anggota berdasarkan id_anggota dari transaksi
            $anggota = $anggotaModels->find($trx['id_anggota']);

            $buku = $bukuModels->find($trx['id_buku']);

            // Ambil data pengembalian berdasarkan id_transaksi
            $pengembalian = $speminjamanModel->where('id_transaksi', $trx['id_transaksi'])->first();
            $denda = $dendaModels->find($pengembalian['id_denda']);
            // Buat array untuk menyimpan data yang akan ditampilkan
            $row = [
                'nama_anggota' => $anggota['nama_anggota'],
                'nis_nisn' => $anggota['nis_nisn'],
                'nama_buku' => $buku['judul'],
                'tanggal_peminjaman' => $trx['tanggal_peminjaman'],
                'tanggal_pengembalian' => $trx['tanggal_pengembalian'],
                'tanggal_dikembalikan' => $pengembalian ? $pengembalian['tanggal_dikembalikan'] : null,
                'telat' => $pengembalian ? $pengembalian['telat'] : null,
                'denda' => $denda['denda'],
            ];

            // Masukkan data ke dalam array utama
            $data[] = $row;
        }

        // Tampilkan data di view
        return view('pages/frontend/speminjaman', ['data' => $data]);
    }
}
