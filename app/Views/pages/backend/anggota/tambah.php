<?= $this->extend('layouts/backend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Anggota<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Anggota</h1>
    <form id="tambahanggota" action="<?php echo base_url('admin/anggota/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_anggota">Nama</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukkan Nama Anggota">
        </div>
        <div class="form-group">
            <label for="aa">Alamat</label>
            <input type="text" class="form-control" id="aa" name="alamat_anggota" placeholder="Masukkan Alamat Anggota">
        </div>
        <div class="form-group">
            <label for="nis_nisn">NIS/NISN</label>
            <input type="number" class="form-control" id="nis_nisn" name="nis_nisn" placeholder="Masukkan Nomor NIS Atau NISN Angota">
        </div>
        <div class="form-group">
            <label for="no_telp_anggota">No Handphone</label>
            <input type="number" class="form-control" id="no_telp_anggota" name="no_telp_anggota" placeholder="Masukkan Nomor Handphone Anggota">
        </div>

        <button class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>