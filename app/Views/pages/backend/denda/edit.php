<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kategori</h1>
    <form id="editdenda" action="<?php echo base_url('admin/denda/update') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $denda['id_denda']; ?>">
        <div class="form-group">
            <label for="denda">Denda</label>
            <input type="number" class="form-control" id="denda" name="denda" value="<?= $denda['denda']; ?>">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>