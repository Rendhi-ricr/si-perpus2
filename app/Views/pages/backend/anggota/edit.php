<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Anggota<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Anggota</h1>
    <form id="editanggota" action="<?php echo base_url('admin/anggota/update') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $anggota['id_anggota']; ?>">
        <div class="form-group">
            <label for="nama_anggota">Nama</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= $anggota['nama_anggota']; ?>">
        </div>
        <div class="form-group">
            <label for="aa">Alamat</label>
            <input type="text" class="form-control" id="aa" name="alamat_anggota" value="<?= $anggota['alamat_anggota']; ?>">
        </div>
        <div class="form-group">
            <label for="nis_nisn">NIS/NISN</label>
            <input type="number" class="form-control" id="nis_nisn" name="nis_nisn" value="<?= $anggota['nis_nisn']; ?>">
        </div>
        <div class="form-group">
            <label for="no_telp_anggota">No Handphone</label>
            <input type="number" class="form-control" id="no_telp_anggota" name="no_telp_anggota" value="<?= $anggota['no_telp_anggota']; ?>">
        </div>

        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>