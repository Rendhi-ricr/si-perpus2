<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Tambah Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kategori</h1>
    <form id="editkategori" action="<?php echo base_url('admin/kategori/update') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $kategori['id_kategori']; ?>">
        <div class="form-group">
            <label for="nk">Nama Kategori</label>
            <input type="text" class="form-control" id="nk" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
        </div>
        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>