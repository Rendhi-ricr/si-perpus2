<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Petugas<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Petugas</h1>
    </div>
    <a href="petugas/tambah" class="btn btn-primary btn-sm my-4"><i class="bx bx-plus"></i> Tambah Data</a>
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
                            <th>Foto</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($petugas as $key) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key['nama_petugas']; ?></td>
                                <td><img src="<?= base_url('img/petugas/' . $key['foto_petugas']); ?>" style="height: 100px; width: 75px;"></td>
                                <td><?= $key['email']; ?></td>
                                <td><?= $key['no_hp']; ?></td>
                                <td>
                                    <a href="petugas/edit/<?= $key['id_petugas'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="petugas/delete/<?= $key['id_petugas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
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