<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
    </div>
    <a href="kategori/tambah" class="btn btn-primary btn-sm my-4"><i class="bx bx-plus"></i> Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="30">No</th>
                            <th>Nama Kategori</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $key) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $key['nama_kategori']; ?></td>
                                <td>
                                    <a href="kategori/edit/<?= $key['id_kategori'] ?> " class="btn btn-warning btn-sm">Edit</a>
                                    <a href="kategori/delete/<?= $key['id_kategori'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
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