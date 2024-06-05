<?= $this->extend('layouts/frontend/base_layouts') ?>
<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo (base_url("img/banner/073cca3183efc848204b49168e03572d.jpg")) ?>" class="d-block" width="100%" height="500" alt="...">
        </div>
        <div class="carousel-item active">
            <img src="<?php echo (base_url("img/banner/671822c2f63dd5f65d8fd15c9710420b.jpg")) ?>" class="d-block" width="100%" height="500" alt="...">
        </div>
        <div class="carousel-item active">
            <img src="<?php echo (base_url("img/banner/c863eb3621b82b0a0871853e221ef119.jpg")) ?>" class="d-block" width="100%" height="500" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="search-card">
                <h3 class="text-center mb-3">Cari Buku</h3>
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Judul Buku" aria-label="Judul Buku" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="ket mb-3">
        <h1>Buku Terbaru</h1>
    </div>

    <div class="row">
        <?php
        foreach ($buku as $key) : ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= base_url('img/cover_buku/' . $key['cover_buku']); ?>" style="height: 250px; width: 300px;" class="card-img-top" alt="Book Image">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['judul']; ?></h5>
                        <p class="card-text"><strong>Author:</strong> <?= $key['pengarang']; ?></p>
                        <p class="card-text"><strong>Publisher:</strong> <?= $key['penerbit']; ?></p>
                        <p class="card-text"><strong>Year:</strong> <?= $key['tahun_terbit']; ?></p>
                        <p class="card-text"><?= substr($key['ringkasan_buku'], 0, 50) ?>....</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?= $this->endSection() ?>