<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="#">
                <img src="<?php echo (base_url()) ?>/img/logoperpus.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center">
                Perpustakaan Kelompok 4
            </a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url('home') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url('about') ?>">About</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="<?= base_url('auth') ?>" class="btn btn-light my-2 my-sm-0 login-btn">Login</a>
                <!-- <button class="btn btn-light my-2 my-sm-0 login-btn" type="submit"></button> -->
            </form>
        </div>
    </div>
</nav>