<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\transaksiModels;
use App\Models\anggotaModels;
use App\Models\bukuModels;
use App\Models\detailTransaksiModels;
use App\Models\historiTransaksiModels;
use App\Models\historiDetailTransaksiModels;
use App\Models\dendaModels;

class transaksi extends BaseController
{
    protected $transaksiModels,
        $anggotaModels,
        $bukuModels,
        $detailTransaksiModels,
        $db,
        $historiTransaksiModels,
        $historiDetailTransaksiModels,
        $dendaModels;

    public function __construct()
    {
        $this->transaksi = new transaksiModels();
        $this->anggota = new anggotaModels();
        $this->buku = new bukuModels();
        $this->denda = new dendaModels();
        $this->detailTransaksi = new detailTransaksiModels();
        $this->historiTransaksi = new HistoriTransaksiModels();
        $this->historiDetailTransaksi = new HistoriDetailTransaksiModels();
        $this->db = \Config\Database::connect(); // Inisialisasi database
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi->getTransaksiWithDetails();
        return view('pages/backend/transaksi', $data);
    }

    public function detail($id_transaksi)
    {
        $transaksi = $this->transaksi->getTransaksiWithDetails($id_transaksi);
        $detailTransaksi = $this->transaksi->getDetailByTransaksi($id_transaksi);

        if ($transaksi) {
            $data = [
                'title' => 'Detail Transaksi',
                'transaksi' => $transaksi,
                'detailTransaksi' => $detailTransaksi,
            ];

            return view('pages/backend/transaksi/detail', $data);
        } else {
            return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function tambah()
    {
        $data = [
            'anggota' => $this->anggota->findAll(),
            'buku' => $this->buku->findAll(),
            'denda' => $this->denda->findAll(), // Ambil semua denda dari tabel denda
        ];
        return view('pages/backend/transaksi/tambah', $data);
    }



    public function simpan()
    {
        // Tangkap data dari formulir
        $id_anggota = $this->request->getPost('id_anggota');
        $tanggal_peminjaman = $this->request->getPost('tanggal_peminjaman');
        $tanggal_pengembalian = $this->request->getPost('tanggal_pengembalian');
        $id_buku_list = $this->request->getPost('id_buku'); // Array of book IDs
        $id_denda = $this->request->getPost('id_denda'); // ID denda yang dipilih

        // Simpan data transaksi
        $this->transaksi->save([
            'id_anggota' => $id_anggota,
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'id_denda' => $id_denda // Simpan ID denda
        ]);

        $id_transaksi = $this->transaksi->insertID();

        // Simpan detail transaksi
        foreach ($id_buku_list as $id_buku) {
            $this->detailTransaksi->save([
                'id_transaksi' => $id_transaksi,
                'id_buku' => $id_buku,
            ]);
        }

        return redirect()->to('admin/transaksi')->with('success', 'Transaksi berhasil disimpan.');
    }


    public function edit($id_transaksi)
    {
        $transaksi = $this->transaksi->getTransaksiWithDetails($id_transaksi);
        $detailTransaksi = $this->transaksi->getDetailByTransaksi($id_transaksi);
        $anggota = $this->anggota->findAll();
        $buku = $this->buku->findAll();

        if ($transaksi) {
            $data = [
                'title' => 'Edit Data Transaksi',
                'transaksi' => $transaksi,
                'detailTransaksi' => $detailTransaksi,
                'anggota' => $anggota,
                'buku' => $buku,
            ];

            return view('pages/backend/transaksi/edit', $data);
        } else {
            return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function update($id_transaksi)
    {
        $id_anggota = $this->request->getPost('id_anggota');
        $tanggal_peminjaman = $this->request->getPost('tanggal_peminjaman');
        $tanggal_pengembalian = $this->request->getPost('tanggal_pengembalian');
        $id_buku_list = $this->request->getPost('id_buku'); // Array of book IDs

        // Update data transaksi
        $this->transaksi->update($id_transaksi, [
            'id_anggota' => $id_anggota,
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggal_pengembalian,
        ]);

        // Hapus detail transaksi lama
        $this->detailTransaksi->where('id_transaksi', $id_transaksi)->delete();

        // Simpan detail transaksi baru
        foreach ($id_buku_list as $id_buku) {
            $this->detailTransaksi->save([
                'id_transaksi' => $id_transaksi,
                'id_buku' => $id_buku,
            ]);
        }

        return redirect()->to('admin/transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }


    public function selesai($id_transaksi)
    {
        $transaksi = $this->transaksi->find($id_transaksi);
        if ($transaksi) {
            $detailTransaksi = $this->detailTransaksi->where('id_transaksi', $id_transaksi)->findAll();

            $tanggal_dikembalikan = date('Y-m-d'); // Atau ambil dari input form jika diperlukan
            $telat = (strtotime($tanggal_dikembalikan) > strtotime($transaksi['tanggal_pengembalian'])) ? (strtotime($tanggal_dikembalikan) - strtotime($transaksi['tanggal_pengembalian'])) / (60 * 60 * 24) : 0;

            // Ambil tarif denda dari tabel denda
            $denda = 0;
            $tarif_denda = $this->denda->find($transaksi['id_denda']);
            if ($tarif_denda) {
                $denda = $telat * $tarif_denda['denda']; // Hitung total denda
            }

            // Simpan data ke tabel histori_transaksi
            $this->historiTransaksi->save([
                'id_anggota' => $transaksi['id_anggota'],
                'tanggal_peminjaman' => $transaksi['tanggal_peminjaman'],
                'tanggal_pengembalian' => $transaksi['tanggal_pengembalian'],
                'tanggal_dikembalikan' => $tanggal_dikembalikan,
                'telat' => $telat,
                'denda' => $denda, // Simpan nilai denda
            ]);

            $id_histori_transaksi = $this->historiTransaksi->insertID();

            // Simpan detail transaksi yang selesai ke histori detail transaksi
            foreach ($detailTransaksi as $detail) {
                $this->historiDetailTransaksi->save([
                    'id_histori_transaksi' => $id_histori_transaksi,
                    'id_buku' => $detail['id_buku'],
                    // Tambahkan kolom lain sesuai kebutuhan
                ]);
            }

            // Hapus data dari tabel transaksi
            $this->transaksi->delete($id_transaksi);

            // Hapus detail transaksi terkait
            $this->detailTransaksi->where('id_transaksi', $id_transaksi)->delete();

            // Redirect kembali ke halaman transaksi dengan pesan sukses
            return redirect()->to('admin/transaksi')->with('success', 'Transaksi selesai dan dipindahkan ke tabel pengembalian.');
        } else {
            return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
        }
    }


    // public function selesai($id_transaksi)
    // {
    //     $transaksi = $this->transaksi->find($id_transaksi);
    //     if ($transaksi) {
    //         $tanggal_dikembalikan = date('Y-m-d'); // Atau ambil dari input form jika diperlukan
    //         $telat = (strtotime($tanggal_dikembalikan) > strtotime($transaksi['tanggal_pengembalian'])) ? (strtotime($tanggal_dikembalikan) - strtotime($transaksi['tanggal_pengembalian'])) / (60 * 60 * 24) : 0;

    //         // Ambil tarif denda dari tabel denda
    //         $denda = 0;
    //         $tarif_denda = $this->denda->find($transaksi['id_denda']);
    //         if ($tarif_denda && array_key_exists('denda', $tarif_denda)) {
    //             $denda = $telat * $tarif_denda['denda']; // Hitung total denda
    //         } else {
    //             // Jika kunci 'nominal' tidak ada dalam array $tarif_denda
    //             // Mungkin perlu ditangani dengan pesan kesalahan atau tindakan lainnya
    //             // Misalnya, Anda bisa menetapkan nilai default untuk denda
    //             $denda = 0;
    //         }

    //         // Simpan data ke tabel histori_transaksi
    //         $this->historiTransaksi->save([
    //             'id_anggota' => $transaksi['id_anggota'],
    //             'tanggal_peminjaman' => $transaksi['tanggal_peminjaman'],
    //             'tanggal_pengembalian' => $transaksi['tanggal_pengembalian'],
    //             'tanggal_dikembalikan' => $tanggal_dikembalikan,
    //             'telat' => $telat,
    //             'denda' => $denda, // Simpan nilai denda
    //         ]);

    //         // Hapus data dari tabel transaksi
    //         $this->transaksi->delete($id_transaksi);

    //         // Hapus detail transaksi terkait
    //         $this->detailTransaksi->where('id_transaksi', $id_transaksi)->delete();

    //         // Redirect kembali ke halaman transaksi dengan pesan sukses
    //         return redirect()->to('admin/transaksi')->with('success', 'Transaksi selesai dan dipindahkan ke tabel pengembalian.');
    //     } else {
    //         return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
    //     }
    // }








    // public function edit($id_transaksi)
    // {
    //     $transaksi = $this->transaksi->find($id_transaksi);
    //     $detailTransaksi = $this->detailTransaksi->where('id_transaksi', $id_transaksi)->findAll();
    //     $anggota = $this->anggota->findAll();
    //     $buku = $this->buku->findAll();

    //     $data = [
    //         'title' => 'Edit Data Transaksi',
    //         'Transaksi' => $transaksi,
    //         'DetailTransaksi' => $detailTransaksi,
    //         'Anggota' => $anggota,
    //         'Buku' => $buku,
    //     ];

    //     return view('pages/backend/transaksi/edit', $data);
    // }

    // public function update()
    // {
    //     $id_transaksi = $this->request->getVar('id_transaksi');
    //     $id_anggota = $this->request->getVar('id_anggota');
    //     $tanggal_peminjaman = $this->request->getVar('tanggal_peminjaman');
    //     $tanggal_pengembalian = $this->request->getVar('tanggal_pengembalian');
    //     $id_buku_list = $this->request->getVar('id_buku'); // Array of book IDs

    //     // Update data transaksi
    //     $this->transaksi->update($id_transaksi, [
    //         'id_anggota' => $id_anggota,
    //         'tanggal_peminjaman' => $tanggal_peminjaman,
    //         'tanggal_pengembalian' => $tanggal_pengembalian,
    //     ]);

    //     // Hapus detail transaksi lama
    //     $this->detailTransaksi->where('id_transaksi', $id_transaksi)->delete();

    //     // Simpan detail transaksi baru
    //     foreach ($id_buku_list as $id_buku) {
    //         $this->detailTransaksi->save([
    //             'id_transaksi' => $id_transaksi,
    //             'id_buku' => $id_buku,
    //         ]);
    //     }

    //     return redirect()->to('admin/transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    // }

    // public function selesai($id_transaksi)
    // {
    //     $transaksi = $this->transaksi->find($id_transaksi);
    //     if ($transaksi) {
    //         $tanggal_dikembalikan = date('Y-m-d'); // Atau ambil dari input form jika diperlukan
    //         $telat = (strtotime($tanggal_dikembalikan) > strtotime($transaksi['tanggal_pengembalian'])) ? (strtotime($tanggal_dikembalikan) - strtotime($transaksi['tanggal_pengembalian'])) / (60 * 60 * 24) : 0;

    //         // Simpan data ke tabel pengembalian
    //         $this->pengembalian->save([
    //             'id_anggota' => $transaksi['id_anggota'],
    //             'tanggal_peminjaman' => $transaksi['tanggal_peminjaman'],
    //             'tanggal_pengembalian' => $transaksi['tanggal_pengembalian'],
    //             'tanggal_dikembalikan' => $tanggal_dikembalikan,
    //             'telat' => $telat,
    //         ]);

    //         // Hapus data dari tabel transaksi
    //         $this->transaksi->delete($id_transaksi);

    //         // Hapus detail transaksi terkait
    //         $this->detailTransaksi->where('id_transaksi', $id_transaksi)->delete();

    //         // Redirect kembali ke halaman transaksi dengan pesan sukses
    //         return redirect()->to('admin/transaksi')->with('success', 'Transaksi selesai dan dipindahkan ke tabel pengembalian.');
    //     } else {
    //         return redirect()->to('admin/transaksi')->with('error', 'Transaksi tidak ditemukan.');
    //     }
    // }


}
