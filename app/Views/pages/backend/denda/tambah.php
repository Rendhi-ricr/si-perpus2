<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah Denda<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Denda</h1>
    <form id="tambahbuku" action="<?php echo base_url('admin/denda/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="denda">Denda</label>
            <input type="number" class="form-control" id="denda" name="denda" placeholder="Masukkan Jumlah Denda">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>