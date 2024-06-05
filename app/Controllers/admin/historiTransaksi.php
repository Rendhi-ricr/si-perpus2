<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\HistoriTransaksiModels;
use App\Models\HistoriDetailTransaksiModels;

class HistoriTransaksi extends BaseController
{
    protected $historiTransaksiModel, $historiDetailTransaksiModel;

    public function __construct()
    {
        $this->historiTransaksiModel = new HistoriTransaksiModels();
        $this->historiDetailTransaksiModel = new HistoriDetailTransaksiModels();
    }

    public function index()
    {
        $data['historiTransaksi'] = $this->historiTransaksiModel->getHistoriTransaksiWithDetails();
        return view('pages/backend/histori_transaksi', $data);
    }

    public function detail($id_histori_transaksi)
    {
        $historiTransaksi = $this->historiTransaksiModel->getHistoriTransaksiWithDetails($id_histori_transaksi);
        $detailTransaksi = $this->historiDetailTransaksiModel->getDetailByHistoriTransaksi($id_histori_transaksi);

        if ($historiTransaksi) {
            $data = [
                'title' => 'Detail Histori Transaksi',
                'historiTransaksi' => $historiTransaksi,
                'detailTransaksi' => $detailTransaksi,
            ];

            // Debugging: Log or print the data to ensure it's being fetched correctly
            // Uncomment the following line to check the data
            // dd($data);

            return view('pages/backend/detail_histori_transaksi', $data);
        } else {
            return redirect()->to('admin/historiTransaksi')->with('error', 'Histori Transaksi tidak ditemukan.');
        }
    }
}
