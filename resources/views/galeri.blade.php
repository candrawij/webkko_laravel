<x-layout>
  <!-- HERO -->
  <section id="hero" class="py-5" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%); padding-top: 100px; padding-bottom: 120px;">
    <div class="container">
      <div class="row align-items-center">

        <!-- Kiri: Teks -->
        <div class="col-md-6 text-center text-md-start">
          <span class="tagline d-inline-block bg-danger-subtle text-danger px-3 py-1 rounded-pill fw-semibold mb-3" style="font-size: 14px;">Dokumentasi Kegiatan</span>
          <h1 class="hero-title fw-bolder text-dark" style="font-size: 2.8rem; margin-bottom: 0.2rem;">Galeri Kegiatan</h1>
          <h1 class="hero-subtitle fw-bolder text-danger" style="font-size: 2.8rem;">KKO PAUD Kota Semarang</h1>
          <p class="hero-desc text-muted mt-3" style="max-width: 600px; font-size: 1.1rem;">
            Dokumentasi berbagai kegiatan yang telah diselenggarakan oleh KKO PAUD Kota Semarang
          </p>
          <a href="#galeri-section" class="btn btn-join mt-3 fw-medium" style="background-color: #f44336; color: white; padding: 10px 20px; border-radius: 8px;">Lihat Galeri</a>
        </div>

        <!-- Kanan: Gambar -->
        <div class="col-md-6 text-center mt-4 mt-md-0">
          <img src="{{ asset('assets/img/gambar5.png') }}" alt="Ilustrasi Guru dan Anak-anak" class="img-fluid" style="max-width: 500px;">
        </div>

      </div>
    </div>
  </section>

  <!-- GALERI -->
  <section id="galeri-section" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-3">Galeri Kegiatan</h2>
      <p class="text-center text-muted mb-4">Pilih kegiatan untuk melihat dokumentasinya</p>

      <!-- Dropdown Filter (Tanpa Reload) -->
      <div class="text-center mb-5">
        <select id="filterJudul" class="form-select w-auto d-inline-block shadow-sm" style="border-radius: 8px;">
          <option value="">-- Semua Kegiatan --</option>
          @foreach($judulList as $judulItem)
            <option value="{{ $judulItem }}" {{ ($filterJudul == $judulItem) ? 'selected' : '' }}>
              {{ $judulItem }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="row g-4 justify-content-center">
        @php
          $hasImages = false;
        @endphp

        @foreach($resultGaleri as $row)
          @php
            $judul = $row->judul;
            $fotoList = explode(',', $row->foto);
          @endphp

          @foreach($fotoList as $foto)
            @php
              $foto = trim($foto);
              $path = public_path("assets/galeri/" . $foto);
              $assetPath = asset("assets/galeri/" . $foto);
            @endphp
            @if(!empty($foto) && file_exists($path))
              @php $hasImages = true; @endphp
              <div class="col-md-4 col-sm-6 galeri-item" data-judul="{{ $judul }}">
                <div class="card h-100 shadow-sm border-0 rounded-4 card-hover">
                  <img src="{{ $assetPath }}" class="card-img-top rounded-top-4 img-galeri" style="height: 200px; object-fit: cover;" alt="Galeri {{ $judul }}">
                  <div class="card-body text-center bg-white rounded-bottom-4">
                    <h6 class="mb-0 fw-semibold text-dark">{{ $judul }}</h6>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        @endforeach

        <div id="empty-message" class="col-12" style="{{ $hasImages ? 'display:none;' : '' }}">
          <p class="text-center text-muted py-5">Belum ada foto untuk kegiatan ini.</p>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const filterSelect = document.getElementById('filterJudul');
      const galeriItems = document.querySelectorAll('.galeri-item');
      const emptyMessage = document.getElementById('empty-message');

      // Fungsi untuk melakukan filter
      function applyFilter() {
        const selectedValue = filterSelect.value;
        let visibleCount = 0;

        galeriItems.forEach(function(item) {
          if (selectedValue === "" || item.getAttribute('data-judul') === selectedValue) {
            item.style.display = 'block';
            visibleCount++;
          } else {
            item.style.display = 'none';
          }
        });

        if (visibleCount === 0) {
          emptyMessage.style.display = 'block';
        } else {
          emptyMessage.style.display = 'none';
        }
      }

      // Event listener ketika dropdown berubah
      filterSelect.addEventListener('change', applyFilter);

      // Jalankan filter saat pertama kali load (jika ada nilai selected default)
      if(filterSelect.value !== "") {
          applyFilter();
      }
    });
  </script>
  @endpush

  @push('styles')
  <style>
    html {
      scroll-behavior: smooth;
    }
    .btn-join {
      transition: all 0.3s ease;
    }
    .btn-join:hover {
      background-color: white !important;
      color: #f44336 !important;
      border: 2px solid #f44336;
      box-shadow: 0 6px 15px rgba(244, 67, 54, 0.4);
      transform: translateY(-3px) scale(1.05);
    }
    .card-hover {
      transition: all 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .img-galeri {
      transition: all 0.3s ease;
    }
    .card-hover:hover .img-galeri {
      transform: scale(1.02);
    }
  </style>
  @endpush
</x-layout>