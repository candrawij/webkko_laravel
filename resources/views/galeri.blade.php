<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KKO PAUD Kota Semarang</title>
    <link rel="icon" href="../assets/img/logo.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger d-flex align-items-center" href="#">
                <img src="../assets/img/logo.jpg" alt="Logo" width="35" height="35" class="me-2 rounded-circle">
                KKO PAUD Kota Semarang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/anggota">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/legalitas">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="py-5" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);">
        <div class="container">
            <div class="row align-items-center">

                <!-- Kiri: Teks -->
                <div class="col-md-6 text-center text-md-start">
                    <span class="tagline d-inline-block mb-2">Dokumentasi Kegiatan</span>
                    <h1 class="hero-title">Galeri Kegiatan</h1>
                    <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
                    <p class="hero-desc mt-3">
                        Dokumentasi berbagai kegiatan yang telah diselenggarakan oleh KKO PAUD Kota Semarang
                    </p>
                    <a href="#galeri-section" class="btn btn-join mt-3">Lihat Galeri</a>
                </div>

                <!-- Kanan: Gambar -->
                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="../assets/img/gambar5.png" alt="Ilustrasi Guru dan Anak-anak" class="img-fluid"
                        style="max-width: 500px;">
                </div>

            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- GALERI -->
<section id="galeri-section" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-3">Galeri Kegiatan</h2>
        <p class="text-center text-muted mb-4">Pilih kegiatan untuk melihat dokumentasinya</p>

        <!-- Dropdown Filter -->
        <form method="GET" class="text-center mb-5">
            <select name="judul" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
                <option value="">-- Semua Kegiatan --</option>
                
            </select>
        </form>

        <div class="row g-4">
            
        </div>
    </div>
</section>




<!-- FOOTER -->
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row justify-content-center text-center text-md-start">

            <!-- Logo & Deskripsi -->
            <div class="col-md-3 mb-4 mx-md-3">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                    <div class="bg-danger text-white rounded-circle p-2 me-2 d-flex justify-content-center align-items-center"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-book"></i>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold">KKO PAUD</h5>
                        <small class="text-white-50">Kota Semarang</small>
                    </div>
                </div>
                <p class="text-white-50 small mb-0">
                    Kolaborasi profesional untuk kemajuan PAUD di Kota Semarang
                </p>
            </div>

            <!-- Halaman -->
            <div class="col-md-3 mb-4 mx-md-3">
                <h6 class="fw-bold mb-3">Halaman</h6>
                <ul class="list-unstyled">
                    <li><a href="../index.php" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li><a href="../anggota.php" class="text-white-50 text-decoration-none">Anggota</a></li>
                    <li><a href="../kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                    <li><a href="../galeri.php" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li><a href="../kontak.php" class="text-white-50 text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-3 mb-4 mx-md-3">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <p class="mb-1 text-white-50">Email: kkopaudkotasemarang@gmail.com</p>
                <p class="mb-1 text-white-50">Telepon: 0816661087 / 08976622262</p>
                <p class="mb-0 text-white-50">Alamat: Jl. Graha Mukti Utama No. 344b<br>Tlogomulyo, Pedurungan, Kota
                    Semarang
                </p>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center small text-white-50">
            © 2025 KKO PAUD Kota Semarang. Semua hak dilindungi.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>