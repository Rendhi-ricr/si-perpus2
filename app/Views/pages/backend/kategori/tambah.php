<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kategori</h1>
    <form id="tambahbuku" action="<?php echo base_url('admin/kategori/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nk">Nama Kategori</label>
            <input type="text" class="form-control" id="nk" name="nama_kategori" placeholder="Masukkan Nama Kategori">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>