<x-layout>
  <!-- HERO -->
  <section id="hero" class="hero-section" style="background-color: #ffe3e3; padding: 80px 20px; position: relative;">
      <div class="container py-5" style="position: relative; z-index: 1;">
          <div class="row align-items-center">
              <!-- Kolom Kiri (Teks) -->
              <div class="col-md-6">
                  <a href="{{ route('index') }}" class="back-link d-inline-block mb-3" style="color: #ff3c3c; text-decoration: none; font-size: 16px;">← Kembali ke Beranda</a>
                  <h1 class="hero-title fw-bolder text-dark" style="font-size: 2.8rem;">
                      Mari Terhubung</span>
                  </h1>
                  <p class="hero-desc text-muted mt-3" style="max-width: 600px; font-size: 1.1rem;">
                      Kami siap membantu Anda dalam mengembangkan pendidikan anak usia dini. Mari berkolaborasi untuk
                      masa depan yang lebih cerah bagi generasi penerus bangsa.
                  </p>
                  <div class="d-flex flex-wrap gap-4 mt-4">
                      <div class="d-flex align-items-center gap-2 text-success fw-medium">
                          <i class="bi bi-award fs-5"></i> Terpercaya
                      </div>
                      <div class="d-flex align-items-center gap-2 text-success fw-medium">
                          <i class="bi bi-heart fs-5"></i> Berpengalaman
                      </div>
                      <div class="d-flex align-items-center gap-2 text-success fw-medium">
                          <i class="bi bi-star fs-5"></i> Profesional
                      </div>
                  </div>
              </div>

              <!-- Kolom Kanan (Gambar) -->
              <div class="col-md-6 text-center mt-5 mt-md-0">
                  <img src="{{ asset('assets/img/gambarkontak.jpg') }}" alt="Anak-anak belajar" class="img-fluid rounded-4 shadow-sm"
                      style="max-width: 100%; height: auto;">
              </div>
          </div>
      </div>
  </section>

  <!-- KONTAK -->
  <section class="py-5" style="background-color: #fff0f0;">
      <div class="container">

          <!-- Tambahan Judul dan Deskripsi -->
          <div class="text-center mb-5">
              <h2 class="fw-bold">
                  Informasi <span class="text-danger">Kontak</span>
              </h2>
              <p class="text-muted">
                  Hubungi kami melalui berbagai cara yang tersedia. Tim kami siap melayani<br />
                  Anda dengan sepenuh hati.
              </p>
          </div>

          <!-- Baris Isi Kontak -->
          <div class="row g-4 justify-content-center">

              <!-- Alamat -->
              <div class="col-md-3 col-sm-6">
                  <a href="https://maps.google.com/?q=Jl.+Graha+Mukti+Utama+No.+344b,+Pedurungan,+Semarang" target="_blank" class="text-decoration-none">
                      <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4 contact-card">
                          <div class="icon-circle-soft mb-3 mx-auto" style="width: 60px; height: 60px; background-color: #ffe3e3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                              <i class="bi bi-geo-alt-fill text-danger" style="font-size: 1.8rem;"></i>
                          </div>
                          <h5 class="fw-bold text-dark">Alamat</h5>
                          <p class="text-muted small mb-0">Jl. Graha Mukti Utama No. 344b</p>
                          <p class="text-muted small mb-0">Pedurungan</p>
                          <p class="text-muted small">Kota Semarang, Jawa Tengah</p>
                      </div>
                  </a>
              </div>

              <!-- Telepon -->
              <div class="col-md-3 col-sm-6">
                  <a href="tel:0816661087" class="text-decoration-none">
                      <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4 contact-card">
                          <div class="icon-circle-soft mb-3 mx-auto" style="width: 60px; height: 60px; background-color: #ffe3e3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                              <i class="bi bi-telephone-fill text-danger" style="font-size: 1.8rem;"></i>
                          </div>
                          <h5 class="fw-bold text-dark">Telepon</h5>
                          <p class="text-muted small mb-0">0816661087</p>
                          <p class="text-muted small">08976622262</p>
                      </div>
                  </a>
              </div>

              <!-- Email -->
              <div class="col-md-3 col-sm-6">
                  <a href="mailto:kkopaudkotasemarang@gmail.com" class="text-decoration-none">
                      <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4 contact-card">
                          <div class="icon-circle-soft mb-3 mx-auto" style="width: 60px; height: 60px; background-color: #ffe3e3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                              <i class="bi bi-envelope-fill text-danger" style="font-size: 1.8rem;"></i>
                          </div>
                          <h5 class="fw-bold text-dark">Email</h5>
                          <p class="text-muted small mb-0">kkopaudkotasemarang@gmail.com</p>
                      </div>
                  </a>
              </div>

              <!-- Jam Operasional -->
              <div class="col-md-3 col-sm-6">
                  <div class="card text-center border-0 shadow-sm p-4 h-100 rounded-4 contact-card">
                      <div class="icon-circle-soft mb-3 mx-auto" style="width: 60px; height: 60px; background-color: #ffe3e3; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                          <i class="bi bi-clock-fill text-danger" style="font-size: 1.8rem;"></i>
                      </div>
                      <h5 class="fw-bold text-dark">Jam Operasional</h5>
                      <p class="text-muted small mb-0">Senin - Jumat</p>
                      <p class="text-muted small">08:00 - 16:00 WIB</p>
                  </div>
              </div>

          </div>
      </div>
  </section>

  <!-- IKUTI MEDIA SOSIAL -->
  <section class="py-5" style="background-color: #fff0f0;">
      <div class="container">
          <div class="bg-white rounded-4 shadow-sm p-4 text-center">
              <h3 class="fw-bold">Ikuti Media Sosial Kami</h3>
              <p class="text-muted mb-4">
                  Dapatkan update terbaru tentang kegiatan, program pelatihan, dan inspirasi pendidikan anak usia dini
              </p>
              <div class="row justify-content-center g-3">

                  <!-- Instagram -->
                  <div class="col-6 col-md-3">
                      <a href="https://instagram.com/kkopaudkotasemarang" target="_blank"
                          class="text-decoration-none text-dark">
                          <div class="border rounded-4 py-3 h-100 social-card">
                              <i class="bi bi-instagram text-danger fs-4"></i>
                              <p class="fw-semibold mt-2 mb-0">Instagram</p>
                          </div>
                      </a>
                  </div>

                  <!-- YouTube -->
                  <div class="col-6 col-md-3">
                      <a href="https://www.youtube.com/@kkopaudkotasemarang242" target="_blank"
                          class="text-decoration-none text-dark">
                          <div class="border rounded-4 py-3 h-100 social-card">
                              <i class="bi bi-youtube text-danger fs-4"></i>
                              <p class="fw-semibold mt-2 mb-0">YouTube</p>
                          </div>
                      </a>
                  </div>

                  <!-- WhatsApp -->
                  <div class="col-6 col-md-3">
                      <a href="https://wa.me/6281266622262" target="_blank" class="text-decoration-none text-dark">
                          <div class="border rounded-4 py-3 h-100 social-card">
                              <i class="bi bi-whatsapp text-success fs-4"></i>
                              <p class="fw-semibold mt-2 mb-0">WhatsApp</p>
                          </div>
                      </a>
                  </div>

              </div>
          </div>
      </div>
  </section>

  <!-- AKSI CEPAT (Dipertahankan dan diperbaiki sesuai permintaan) -->
  <section class="py-5" style="background-color: #fff0f0;">
      <div class="container">
          <div class="bg-white rounded-4 shadow-sm p-4 text-center">
              <h3 class="fw-bold">Aksi Cepat</h3>
              <p class="text-muted mb-4">
                  Langsung akses ke layanan yang Anda butuhkan
              </p>
              <div class="row justify-content-center g-3">

                  <!-- Daftar Anggota -->
                  <div class="col-md-5">
                      <a href="{{ route('pendaftaran.create') }}" class="text-white text-decoration-none">
                          <div class="bg-success rounded-4 p-3 text-start h-100 action-card" style="transition: 0.3s;">
                              <i class="bi bi-person-lines-fill fs-5"></i>
                              <h6 class="fw-bold mt-2 mb-1">Daftar Menjadi Anggota KKO</h6>
                              <p class="mb-0 small">Tingkatkan kompetensi Anda</p>
                          </div>
                      </a>
                  </div>


                  <!-- Jadwal Kegiatan -->
                  <div class="col-md-5">
                      <a href="{{ asset('assets/dokumen/kalender_kegiatan_2025.pdf') }}" target="_blank"
                          class="text-dark text-decoration-none">
                          <div class="border rounded-4 p-3 text-start h-100 action-card" style="transition: 0.3s;">
                              <i class="bi bi-calendar-event text-success fs-5"></i>
                              <h6 class="fw-bold mt-2 mb-1">Kalender KKO PAUD KOTA SEMARANG</h6>
                              <p class="mb-0 small">Ikuti kegiatan terbaru kami</p>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>

  @push('styles')
  <style>
      .contact-card, .social-card, .action-card {
          transition: all 0.3s ease;
      }
      .contact-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
      }
      .social-card:hover {
          background-color: #f8f9fa;
          border-color: #dc3545 !important;
          color: #dc3545 !important;
          transform: translateY(-3px);
      }
      .action-card:hover {
          transform: scale(1.03);
          box-shadow: 0 8px 15px rgba(0,0,0,0.1);
      }
      .back-link:hover {
          color: #cc0000 !important;
          text-decoration: underline !important;
      }
  </style>
  @endpush
</x-layout>