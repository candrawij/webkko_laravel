<x-layout>
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
</x-layout>