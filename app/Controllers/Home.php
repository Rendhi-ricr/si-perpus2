<?php

namespace App\Controllers;

use App\Models\bukuModels;



class Home extends BaseController
{
    protected $bukuModels;
    public function __construct()
    {
        $this->bukuModels = new bukuModels();
    }

    public function index()
    {
        $buku = $this->bukuModels->orderBy("tanggal_input_buku", "DESC")->limit(4)->find();
        $data = [
            'title' => 'Data Berita',
            'buku' => $buku,
        ];
        return view('pages/frontend/home', $data);
    }
}
