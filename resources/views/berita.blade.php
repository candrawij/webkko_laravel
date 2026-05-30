<x-layout>
  <!-- HEADER -->
  <div id="hero" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%); padding-top: 60px; padding-bottom: 60px;">
    <div class="container">
      <h2 class="fw-bold">KKO PAUD KOTA SEMARANG</h2>
      <small class="text-danger">VALID DAN AKURAT</small>
    </div>
  </div>

  <div class="container mt-4 mb-5">
    <div class="row">

      <!-- ================= LEFT ================= -->
      <div class="col-md-8">

        <!-- 🔥 LIST BERITA -->
        @forelse($berita_list as $row)
          @php
            $foto = (!empty($row->foto) && file_exists(public_path("assets/berita/" . $row->foto))) 
                ? asset("assets/berita/" . $row->foto) 
                : asset("assets/img/logo.jpg");
          @endphp

          <div class="mb-4 pb-3 border-bottom card-hover">
            <div class="row">
              <!-- FOTO -->
              <div class="col-md-4">
                <a href="{{ route('berita.show', $row->slug) }}">
                  <img src="{{ $foto }}" class="img-main rounded-3" style="width: 100%; height: 220px; object-fit: cover;">
                </a>
              </div>

              <!-- TEXT -->
              <div class="col-md-8 d-flex flex-column justify-content-center">
                <div class="title mt-3 mt-md-0">
                  <a href="{{ route('berita.show', $row->slug) }}" class="text-dark fw-bold fs-5 text-decoration-none hover-danger" style="transition: 0.3s;">
                    {{ $row->judul }}
                  </a>
                </div>

                <small class="text-muted mt-2">
                  📅 {{ date("d M Y", strtotime($row->created_at)) }}
                </small>

                <p class="mt-2 text-muted" style="line-height: 1.6;">
                  {{ Str::limit(strip_tags($row->konten), 150) }}
                </p>
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">Belum ada berita yang tersedia.</p>
        @endforelse

      </div>

      <!-- ================= RIGHT ================= -->
      <div class="col-md-4">
        <div class="sidebar bg-white p-4 rounded-4 shadow-sm" style="border: 1px solid #f0f0f0;">

          <!-- SEARCH -->
          <h6 class="fw-bold mb-3 d-flex align-items-center"><i class="bi bi-search text-danger me-2"></i> Search</h6>
          <input type="text" class="form-control mb-4 rounded-3" placeholder="Cari berita...">

          <!-- RECENT -->
          <h6 class="fw-bold mt-3 mb-3 d-flex align-items-center"><i class="bi bi-clock-history text-danger me-2"></i> Recent Posts</h6>

          @forelse($recent as $r)
            <div class="mb-3 d-flex align-items-start">
              <i class="bi bi-chevron-right text-danger me-2 small pt-1"></i>
              <a href="{{ route('berita.show', $r->slug) }}" class="text-dark small text-decoration-none hover-danger" style="transition: 0.3s;">
                {{ $r->judul }}
              </a>
            </div>
          @empty
            <p class="text-muted small">Belum ada posts</p>
          @endforelse

          <!-- INFO -->
          <h6 class="fw-bold mt-5 mb-2 d-flex align-items-center"><i class="bi bi-info-circle text-danger me-2"></i> Info</h6>
          <p class="small text-muted mb-0">
            Portal resmi KKO PAUD Kota Semarang. Temukan informasi terbaru seputar perkembangan dan edukasi anak usia dini.
          </p>

        </div>
      </div>

    </div>
  </div>

  @push('styles')
  <style>
    .hover-danger:hover {
      color: #dc3545 !important;
    }
    .card-hover:hover .img-main {
      transform: scale(1.02);
      transition: 0.3s;
    }
    .img-main {
      transition: 0.3s;
    }
    .sidebar {
      position: sticky;
      top: 100px;
    }
  </style>
  @endpush
</x-layout>