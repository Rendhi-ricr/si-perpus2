<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Petugas<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Anggota</h1>
    </div>
    <a href="anggota/tambah" class="btn btn-primary btn-sm my-4"><i class="bx bx-plus"></i> Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIS/NISN</th>
                            <th>No Handphone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($anggota as $key) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key['nama_anggota']; ?></td>
                                <td><?= $key['alamat_anggota']; ?></td>
                                <td><?= $key['nis_nisn']; ?></td>
                                <td><?= $key['no_telp_anggota']; ?></td>
                                <td>
                                    <a href="anggota/edit/<?= $key['id_anggota'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="anggota/delete/<?= $key['id_anggota'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- DataTales Example -->



<?= $this->endSection() ?>