<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>KKO PAUD Kota Semarang</title>
    <link rel="icon" href="assets/img/logo.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger d-flex align-items-center" href="#">
                <img src="assets/img/logo.jpg" alt="Logo" width="35" height="35" class="me-2 rounded-circle">
                KKO PAUD Kota Semarang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/index">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/anggota">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="/legalitas">Legalitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO DENGAN SLIDESHOW BACKGROUND -->
    <section id="hero" class="text-center position-relative overflow-hidden">

        <!-- Carousel Background -->
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/gambarkontak.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide1">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g2.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide2">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g3.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide3">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/g4.jpg" class="d-block w-100" style="height:100vh; object-fit:cover;"
                        alt="slide4">
                </div>
            </div>

            <!-- Indicator bulatan -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
            </div>
        </div>

        <!-- Overlay konten -->
        <div class="container position-absolute top-50 start-50 translate-middle text-white text-center animate__animated animate__fadeInUp"
            style="z-index:2;">
            <span class="tagline bg-danger-subtle text-danger px-3 py-1 rounded-pill">Komunitas PAUD</span>
            <h1 class="hero-title display-4 fw-bold text-shadow mb-1"
                style="color:#fff; text-shadow: 3px 3px 12px rgba(0,0,0,0.9);">
                KKO PAUD
            </h1>
            <h1 class="hero-subtitle display-4 fw-bold text-shadow mb-3"
                style="text-shadow: 3px 3px 12px rgba(0,0,0,0.9);">
                Kota Semarang
            </h1>
            <p class="hero-desc mt-3 p-3 rounded-3"
                style="color:#fff; text-shadow: 2px 2px 8px rgba(66, 66, 66, 0.3); max-width:700px; margin:auto;">
                Wadah kolaborasi profesional operator PAUD yang berfokus pada peningkatan mutu pendidikan anak usia dini
                melalui pelatihan, digitalisasi, dan kegiatan sosial.
            </p>
            <div class="mt-4">
                <a href="anggota.php" class="btn btn-danger btn-lg me-2 shadow">Bergabung Sekarang</a>
                <a href="kegiatan.php" class="btn btn-outline-light btn-lg shadow">Lihat Kegiatan</a>
            </div>
        </div>

        <!-- Overlay gradien -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)); z-index:1;"></div>
    </section>

    <!-- SAMBUTAN KETUA UMUM -->
    <section class="py-5" id="sambutan">
        <div class="container">
            <h2 class="fw-bold text-center text-danger mb-4">Ketua Umum</h2>
            <div class="row align-items-start">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="assets\img\ketuakko_viveno.jpg" alt="Viveno Susilo" class="img-fluid rounded-4 shadow-sm">
                    <h5 class="fw-bold mt-3 mb-0">Viveno Susilo</h5>
                    <small class="text-muted">Ketua Umum KKO PAUD Kota Semarang</small>
                </div>
                <div class="col-md-9">
                    <div id="sambutanText" class="sambutan-wrapper">
                        <p>Assalamu’alaikum warahmatullahi wabarakatuh,<br>
                            Salam sejahtera bagi kita semua,<br>
                            Namo Buddhaya, Om Swastiastu Om, Salam kebajikan.</p>

                        <p>Puji syukur kepada Tuhan Yang Maha Kuasa atas segala rahmat dan berkat-Nya kepada kita semua,
                            para pengurus dan anggota KKO PAUD, sehingga kita masih dapat berbagi, masih terus bekerja
                            cerdas demi kemajuan kita bersama.</p>

                        <p>Perkembangan dunia internet sangat pesat dan menjadi salah satu indikator kemajuan teknologi
                            informasi dan komunikasi di Indonesia. Hal ini terbukti dengan semakin meratanya akses
                            internet hingga ke pelosok desa. Internet sebagai media informasi super cepat sepertinya
                            telah menjadi salah satu kebutuhan pokok informasi bagi siapa pun tanpa terkecuali.</p>

                        <p>Segala hal yang berbau teknologi menjadi senjata bagi Revolusi Industri 4.0. Mengapa? Karena
                            revolusi ini mengasumsikan adanya perubahan cara dari yang tradisional menuju modern.
                            Singkatnya, segala sesuatu yang kita kerjakan sangat bergantung pada teknologi dan
                            algoritmanya masing-masing. Semua orang dituntut untuk dapat mahir menggunakan teknologi.
                        </p>

                        <p>Berkenaan dengan itu, sebagai organisasi yang memberikan perhatian penuh terhadap aspek
                            peningkatan kompetensi TIK pada setiap kegiatan guru, operator sekolah, dan kepala sekolah,
                            KKO PAUD meluncurkan website ini guna memenuhi kebutuhan akan informasi yang terkait dengan
                            Dapodik, NISN, E-Rapor, NUPTK, SIMPKB, dan semua informasi seputar dunia pendidikan, serta
                            menjadi sarana komunikasi yang efektif di era digital dan internet.</p>

                        <p>Harapan kami, dengan diluncurkannya website ini, KKO PAUD dapat menjadi sumber informasi yang
                            berkaitan dengan hal-hal di atas. Melalui tim IT yang ada di dalam KKO PAUD, kami akan
                            berusaha untuk selalu melakukan pembaruan secara berkala sehingga pengguna dan masyarakat
                            luas dapat melihat perkembangan digitalisasi pendidikan.</p>

                        <p>Dukungan, masukan, dan saran dari pengurus serta anggota KKO PAUD, maupun dari pengunjung
                            website ini, sangat kami harapkan agar menjadi bahan evaluasi demi memberikan yang terbaik
                            di masa mendatang.</p>

                        <p class="fw-semibold">Semarang, 12 Maret 2022<br>Ketua Umum<br>Viveno Susilo</p>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-outline-danger btn-sm" id="toggleSambutan">Lihat Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Tambahkan animate.css untuk animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sambutanDiv = document.getElementById("sambutanText");
        const toggleBtn = document.getElementById("toggleSambutan");

        toggleBtn.addEventListener("click", () => {
            sambutanDiv.classList.toggle("scrollable");
            toggleBtn.textContent = sambutanDiv.classList.contains("scrollable")
                ? "Tutup Sambutan"
                : "Lihat Selengkapnya";
        });
    </script>


</body>

</html>


<!-- VISI MISI START -->
<section id="about" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Apa itu KKO PAUD?</h2>
        <p class="text-muted mb-5">
            KKO PAUD Kota Semarang adalah wadah kelompok kerja operator PAUD yang bertugas mendukung pendataan,
            pelaporan, dan administrasi pendidikan usia dini dengan pemanfaatan teknologi informasi, sekaligus
            meningkatkan kapasitas dan profesionalisme operator dalam bidang TIK.
        </p>

        <div class="row g-4">
            <!-- Visi -->
            <div class="col-md-4">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3 text-center">
                        <i class="bi bi-eye-fill text-danger me-2"></i>Visi Kami
                    </h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Mewujudkan Kelompok Kerja Operator PAUD yang Handal, Solid</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Berkualitas dalam Pengelolaan Administrasi Sekolah yang Berbasis IPTEK</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-4">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3 text-center">
                        <i class="bi bi-bullseye text-danger me-2"></i>Misi Kami
                    </h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Meningkatkan Profesionalisme SDM Operator Sekolah Dalam Bidang TIK</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Membangun Jaringan Komunikasi dan Informasi</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Menjamin Mitra Kerja Dengan Pemangku Kepentingan</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Penyampaian Informasi Secara Cepat, Tepat, Akurat, dan Dapat Dipercaya</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Meningkatkan Validitas data dan persaudaraan Dalam Bekerja, Baik, Jujur, Amanah, dan
                                Solidaritas</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Mewujudkan Satu Nusa Satu Bangsa Satu Bahasa dan Satu Data yang Berkualitas</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tujuan -->
            <div class="col-md-4">
                <div class="p-4 h-100 shadow-sm rounded-4 border-start border-4 border-danger text-start">
                    <h5 class="fw-bold mb-3 text-center">
                        <i class="bi bi-flag-fill text-danger me-2"></i>Tujuan Kami
                    </h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Menjembatani antara pihak sekolah dengan instansi yang terkait</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Meningkatkan kinerja operator sekolah dalam bidang administrasi sekolah</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Menyajikan data yang valid serta dapat dipercaya</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Memperkenalkan keberadaan sekolah</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-check-circle text-danger me-3 mt-1"></i>
                            <span>Mempercepat penyajian data sekolah</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- VISI MISI END -->

<!-- KETUA KKO START -->
<section id="leadership" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">Kepemimpinan KKO PAUD</h2>
        <p class="text-muted mb-5">
            Tim kepemimpinan inti yang berpengalaman dan berdedikasi
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-4 border-0">
                    <img src="assets/img/ketuakko_viveno.jpg" class="card-img-top" alt="Viveno Susilo">
                    <div class="card-body">
                        <h5 class="fw-bold mb
        </div>
    </div>
</section>
<!-- KETUA KKO END -->


<!-- SECTION KEGIATAN TERBARU -->
<section id="activities" class="py-5">
    <style>
        #activities .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </styl>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kegiatan Terbaru</h2>
            <p class="text-muted">Sekilas kegiatan terkini yang sedang berlangsung di KKO PAUD</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-4 border-0">
                    <img src="assets/img/kegiatan1.jpg" class="card-img-top" alt="Kegiatan 1">
                    <div class="card-body">
                        <h5 class="fw-bold mb
        </div>

        <!-- Tombol ke semua kegiatan -->
        <div class="text-center mt-4">
            <a href="kegiatan.php" class="btn btn-outline-danger">Lihat Semua Kegiatan</a>
        </div>
    </div>
</section>

<!-- MARS KKO SECTION START -->
<section id="mars_kko" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-center mb-4 mb-md-0">
                <div class="position-relative d-inline-block">
                    <div class="p-5 bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                        style="width: 300px; height: 300px;">
                        <i class="bi bi-music-note-beamed text-danger" style="font-size: 120px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Mars KKO PAUD Kota Semarang</h2>
                <p class="text-muted mb-4">
                    Dengarkan lagu kebanggaan KKO PAUD Kota Semarang. Mars ini adalah simbol persatuan dan 
                    semangat kolaborasi para operator PAUD dalam meningkatkan mutu pendidikan anak usia dini.
                </p>
                
                <!-- AUDIO PLAYER -->
                <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                    <audio controls class="w-100" style="max-width: 100%; height: 50px;">
                        <source src="serve.php?type=mars_kko&file=mars_kkopaudkotasemarang.mp3" type="audio/mpeg">
                        Browser Anda tidak mendukung pemutar audio HTML5.
                    </audio>
                </div>
                
                <!--<p class="small text-muted">
                    <i class="bi bi-info-circle me-2"></i>
                    File audio disimpan secara aman dan hanya dapat diakses melalui sistem proxy server kami.
                </p>-->
            </div>
        </div>
    </div>
</section>
<!-- MARS KKO SECTION END -->

<!-- MARS KKO PAUD -->
<section id="mars-kko" class="py-5 bg-light">
    <div class="container text-center">
        <!<!-- Lirik Lagu -->
            <div class="card shadow-sm border-0 mx-auto" style="max-width: 720px;">
                <div class="card-body text-start">
                    <h5 class="fw-bold text-primary mb-3">📜 Lirik Mars KKO PAUD</h5>

                    <p class="text-muted mb-2">
                        KKO PAUD Kota Semarang <br>
                        Sebagai mitra dalam berkarya <br>
                        Berkomitmen tingkatkan profesionalisme <br>
                        Sumber daya manusia
                    </p>

                    <p class="text-muted mb-2">
                        Membangun insan yang bekerja sama <br>
                        Hadapi perkembangan dunia <br>
                        Berbasis informasi cepat tepat akurat <br>
                        Serta dapat dipercaya
                    </p>

                    <p class="text-muted mb-2">
                        Bekerja berkualitas jujur solid dan amanah <br>
                        Mengelola masa depan bangsa <br>
                        Untuk mewujudkan tujuan kita bersama
                    </p>

                    <p class="fw-semibold text-success">
                        Berprestasi untuk semua! <br>
                        KKO Maju, Indonesia Jaya!
                    </p>
                </div>
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
                    <li><a href="index.php" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li><a href="anggota.php" class="text-white-50 text-decoration-none">Anggota</a></li>
                    <li><a href="kegiatan.php" class="text-white-50 text-decoration-none">Kegiatan</a></li>
                    <li><a href="galeri.php" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li><a href="kontak.php" class="text-white-50 text-decoration-none">Kontak</a></li>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>