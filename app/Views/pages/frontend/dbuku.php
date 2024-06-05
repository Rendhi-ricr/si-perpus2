<?= $this->extend('layouts/frontend/base_layouts') ?>
<?= $this->section('title') ?>Daftar Buku<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="judul mb-5">
        <h1>Daftar Buku</h1>
    </div>
    <div class="row">
        <?php
        foreach ($Buku as $key => $value) : ?>
            <div class="col-md-6">

                <div class="book-card">
                    <img src="<?= 'img/cover_buku/' . $value->cover_buku ?>" alt="Book 1 Cover" class="book-cover">
                    <div class="book-details">
                        <h2 class="book-title"><?= $value->judul ?></h2>
                        <p class="book-description"><?= implode(' ', array_slice(explode(' ', $value->ringkasan_buku), 0, 15)) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>