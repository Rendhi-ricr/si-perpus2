<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Buku<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Buku</h1>
    </div>
    <a href="buku/tambah" class="btn btn-primary btn-sm my-4"><i class="bx bx-plus"></i> Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Buku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Cover Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Ringkasan Buku</th>
                            <th>Jumlah Salinan Tersedia</th>
                            <th>Kategori</th>
                            <th>Rak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($Buku as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('img/cover_buku/' . $value->cover_buku) ?>" style="height: 100px; width: 75px;"></td>
                                <td><?= $value->judul ?></td>
                                <td><?= $value->pengarang ?></td>
                                <td><?= $value->penerbit ?></td>
                                <td><?= $value->tahun_terbit ?></td>
                                <td><?= implode(' ', array_slice(explode(' ', $value->ringkasan_buku), 0, 15)) ?></td>
                                <td><?= $value->jumlah_salinan_tersedia ?></td>
                                <td><?= $value->nama_kategori ?></td>
                                <td><?= $value->nama_rak; ?></td>
                                <td>
                                    <a href="buku/edit/<?= $value->id_buku ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="buku/delete/<?= $value->id_buku ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
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