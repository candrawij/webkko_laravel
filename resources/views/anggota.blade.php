<x-layout>
  <!-- HERO -->
  <section id="hero" class="text-center" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%); padding-top: 100px; padding-bottom: 220px;">
    <div class="circle"></div>
    <div class="container position-relative" style="z-index:1;">
      <span class="tagline d-inline-block bg-danger-subtle text-danger px-3 py-1 rounded-pill fw-semibold mb-3">Komunitas PAUD</span>
      <h1 class="hero-title fw-bolder text-dark" style="font-size: 2.8rem; margin-bottom: 0.2rem;">Anggota</h1>
      <h1 class="hero-subtitle fw-bolder text-danger" style="font-size: 2.8rem;">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc text-muted mx-auto mt-4" style="max-width: 600px; font-size: 1.1rem;">
        Profesional berpengalaman yang berkomitmen memajukan pendidikan anak usia dini di Kota Semarang
      </p>
      
      <div class="mt-4 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-danger text-white rounded-3 px-4 py-2 fw-medium shadow-sm transition-card" style="transition: all 0.3s ease;">
          <i class="bi bi-person-plus me-1"></i> Bergabung dengan Kami
        </a>
        <a href="{{ route('pendaftaran.cek') }}" class="btn btn-outline-danger bg-white rounded-3 px-4 py-2 fw-medium shadow-sm transition-card" style="transition: all 0.3s ease;">
          <i class="bi bi-check-circle me-1"></i> Cek Status Pendaftaran
        </a>
      </div>
    </div>
  </section>

  <!-- PENGURUS -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-2">Pengurus KKO PAUD</h2>
      <p class="text-center text-muted mb-5">
        Tim kepemimpinan yang berpengalaman dan berdedikasi
      </p>
      <div class="row g-4">
        @forelse($semua_pengurus as $row)
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 text-center p-4 transition-card" style="transition: all 0.3s ease;">
              
              <!-- Foto Pengurus -->
              <div class="text-center mb-3">
                  @if($row->foto && file_exists(public_path('assets/foto_pengurus/' . $row->foto)))
                      <img src="{{ asset('assets/foto_pengurus/' . $row->foto) }}" alt="{{ $row->nama }}" class="rounded-circle shadow mb-2 mx-auto d-block" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #f8f9fa;">
                  @else
                      <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 100px; height: 100px; border: 3px solid #f8f9fa;">
                          <i class="bi bi-person text-white" style="font-size: 2rem;"></i>
                      </div>
                  @endif
              </div>

              <h5 class="fw-bold">{{ $row->nama }}</h5>
              
              <div class="mb-3">
                  <span class="badge bg-danger-subtle text-danger px-3 py-1 rounded-pill" style="font-size: 12px; font-weight: 600;">
                    {{ $row->jabatan }}
                  </span>
              </div>

              <p class="mb-0 mt-auto small">
                <i class="bi bi-mortarboard-fill text-danger me-1"></i>
                <strong>Pendidikan:</strong> {{ $row->pendidikan_terakhir }}
              </p>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p class="text-muted">Data kepemimpinan belum tersedia.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
  
  @push('styles')
  <style>
    .transition-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
    }
    .btn.transition-card:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 6px 15px rgba(244, 67, 54, 0.4) !important;
    }
    .btn-danger.transition-card:hover {
      background-color: white !important;
      color: #f44336 !important;
      border: 1px solid #f44336;
    }
    .btn-outline-danger.transition-card:hover {
      background-color: #f44336 !important;
      color: white !important;
    }
  </style>
  @endpush
</x-layout>