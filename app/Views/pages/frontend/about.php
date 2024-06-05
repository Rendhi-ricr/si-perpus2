<?= $this->extend('layouts/frontend/base_layouts') ?>
<?= $this->section('title') ?>About<?= $this->endSection() ?>
<?= $this->section('content') ?>


<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <h2>Sejarah Perpustakaan</h2>
            <p>Perpustakaan Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi (kemendikbudristek) merupakan perpustakaan utama di lingkungan kemendikbudristek yang dibuka secara resmi oleh Menteri Pendidikan Nasional pada 29 November 2004. Perpustakaan in diharapkan menjadi referensi dalam bidang pendidikan dan kebudayaan dengan menyediakan akses informasi dan pengetahuan yang lengkap, baik dalam bentuk koleksi tercetak maupun digital. Perpustakaan kemendikbudristek juga membina lebih dari 150 perpustakan di lingkungan kemendikbudristek baik di unit utama pusat maupun Unit Pelaksana Teknis (UPT) di daerah.</p>

            <p>Pengelolaan Perpustakaan kemendikbudristek dilaksanakan sesuai dengan Standar Nasional Perpustakaan (SNP) Khusus, dimana pada tahun 2017 Perpustakaan kemendikbudristek telah mendapatkan Akreditasi A oleh Perpustakaan Nasional RI. Perpustakaan kemendikbudristek dikelola secara profesional dengan memanfaatkan teknologi informasi dan komunikasi dalam menunjang pelayanan kepada pemustaka. Perpustakaan berupaya meningkatkan kualitas pelayanan dengan selalu memperbaharui koleksi dan layanan sesuai dengan kebutuhan pemustaka dan arah kebijakan kemendikbudristek. Dengan keunggulan lokasi yang strategis dan nyaman, Perpustakaan kemendikbudristek juga merupakan tempat aktifitas komunitas pendidikan, kebudayaan, riset dan teknologi dalam menyelenggarakan berbagai acara dan kegiatan secara rutin.</p>
        </div>
        <div class="col-4">
            <h2>Kontak Perpustakaan</h2>
            <p>Alamat:</p>
            <p>Jl. RA Kartini KM 3 Subang, Jawa Barat</p>
            <p>Email:</p>
            <p>perpustakaan@subang.go.id</p>
            <p>Telepon:</p>
            <p>123456789</p>
        </div>
    </div>

    <BR>
    <BR>
    <div id="map" style="height: 400px; margin: 0 auto;"></div>
</div>





<?= $this->endSection() ?>