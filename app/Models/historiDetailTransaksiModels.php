<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriDetailTransaksiModels extends Model
{
    protected $table = 'tbl_histori_detail_transaksi';
    protected $primaryKey = 'id_histori_detail_transaksi';
    protected $allowedFields = ['id_histori_transaksi', 'id_buku'];

    public function getDetailByHistoriTransaksi($id_histori_transaksi)
    {
        $query = $this->db->table($this->table)
            ->select('tbl_buku.judul, tbl_histori_transaksi.tanggal_peminjaman, tbl_histori_transaksi.tanggal_pengembalian, tbl_histori_transaksi.tanggal_dikembalikan, tbl_histori_transaksi.telat, tbl_histori_transaksi.denda,')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_histori_detail_transaksi.id_buku')
            ->join('tbl_histori_transaksi', 'tbl_histori_transaksi.id_histori_transaksi = tbl_histori_detail_transaksi.id_histori_transaksi')
            ->where('tbl_histori_detail_transaksi.id_histori_transaksi', $id_histori_transaksi)
            ->get();

        // Log or print the last query and results for debugging
        // Uncomment these lines to debug
        // echo $this->db->getLastQuery(); // Print the last query
        // print_r($query->getResult()); // Print the result set

        return $query->getResult();
    }
}
