<?= $this->extend('layouts/frontend/base_layouts') ?>
<?= $this->section('title') ?>Sejarah Peminjaman<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="profile">
        <?php foreach ($data as $value) : ?>
            <h1>
                <td><?= $value['nama_anggota'] ?></td>
            </h1>
            <h1>
                <td><?= $value['nis_nisn'] ?></td>
            </h1>
        <?php endforeach; ?>
    </div>
    <div class="block mt-5">
        <div class="card">
            <div class="card-header">
                <h6>Sejarah Peminjaman</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Tanggal Dikembalikan</th>
                                <th>Telat</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama_buku'] ?></td>
                                    <td><?= $row['tanggal_peminjaman'] ?></td>
                                    <td><?= $row['tanggal_pengembalian'] ?></td>
                                    <td><?= $row['tanggal_dikembalikan'] ?></td>
                                    <td><?= $row['telat'] ?></td>
                                    <td><?= $row['denda'] ?></td>

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