<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah rak<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data rak</h1>
    <form id="tambahrak" action="<?php echo base_url('admin/rak/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nr">Nama rak</label>
            <input type="text" class="form-control" id="nr" name="nama_rak" placeholder="Masukkan Nama rak">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>