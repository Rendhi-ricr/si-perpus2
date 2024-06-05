<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title'); ?>Detail Transaksi<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Transaksi</h6>
            </div>
            <div class="card-body">
                <p>ID Histori Transaksi: <?= $historiTransaksi->id_histori_transaksi ?></p>
                <p>Tanggal Peminjaman: <?= $historiTransaksi->tanggal_peminjaman ?></p>
                <p>Tanggal Pengembalian: <?= $historiTransaksi->tanggal_pengembalian ?></p>
                <p>Tanggal Dikembalikan: <?= $historiTransaksi->tanggal_dikembalikan ?></p>
                <p>Telat: <?= $historiTransaksi->telat ?></p>
                <p>Denda: <?= $historiTransaksi->denda ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Tanggal Dikembalikan</th>
                                <th>Telat</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1; ?>
                            <?php foreach ($detailTransaksi as $detail) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $detail->judul ?></td>
                                    <td><?= $detail->tanggal_peminjaman ?></td>
                                    <td><?= $detail->tanggal_pengembalian ?></td>
                                    <td><?= $detail->tanggal_dikembalikan ?></td>
                                    <td><?= $detail->telat ?> Hari</td>
                                    <td>Rp. <?= $detail->denda ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>