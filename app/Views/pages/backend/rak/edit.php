<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah rak<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data rak</h1>
    <form id="editrak" action="<?php echo base_url('admin/rak/update') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $rak['id_rak']; ?>">
        <div class="form-group">
            <label for="nk">Nama rak</label>
            <input type="text" class="form-control" id="nk" name="nama_rak" value="<?= $rak['nama_rak']; ?>">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>