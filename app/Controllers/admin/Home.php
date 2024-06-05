<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\anggotaModels;
use App\Models\bukuModels;
use App\Models\transaksiModels;

class Home extends BaseController
{
    public function index()
    {
        $buku = count(model(bukuModels::class)->findAll());
        $transaksi = count(model(transaksiModels::class)->findAll());
        $anggota = count(model(anggotaModels::class)->findAll());

        $data = [
            'buku' => $buku,
            'transaksi' => $transaksi,
            'anggota' => $anggota,
        ];

        return view('pages/backend/home', $data);
    }
}
