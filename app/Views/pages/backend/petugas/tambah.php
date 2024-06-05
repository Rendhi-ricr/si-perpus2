<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Petugas<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Buku</h1>
    <form id="tambahbuku" action="<?php echo base_url('admin/petugas/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_petugas">Nama</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Petugas">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Petugas">
        </div>
        <div class="form-group">
            <label for="no_hp">Nomor Handphone</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone Petugas">
        </div>
        <div class="form-group">
            <label for="photo">Pilih Foto:</label>
            <input type="file" class="form-control-file" id="photo" name="foto_petugas" accept="image/*">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>