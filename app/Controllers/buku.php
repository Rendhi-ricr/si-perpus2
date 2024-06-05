<?php

namespace App\Controllers;

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
        return view('pages/frontend/dbuku', $data);
    }
}
