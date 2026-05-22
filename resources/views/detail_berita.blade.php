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

        <!-- JUDUL -->
        <h1 class="title fw-bold" style="font-size: 28px; line-height: 1.4; color: #1a1a1a;">
          {{ $data->judul }}
        </h1>

        <!-- META -->
        <div class="meta mb-4 text-muted d-flex align-items-center gap-3 pb-3 border-bottom mt-3" style="font-size: 14px;">
          <span><i class="bi bi-clock text-danger me-1"></i> {{ date("d M Y", strtotime($data->created_at)) }}</span>
          <span><i class="bi bi-tag text-danger me-1"></i> {{ ucfirst($data->kategori) }}</span>
          <span><i class="bi bi-eye text-danger me-1"></i> {{ number_format($data->views ?? 0) }} Views</span>
        </div>

        <!-- FOTO -->
        @php
          $foto = (!empty($data->foto) && file_exists(public_path("assets/berita/" . $data->foto))) 
                ? asset("assets/berita/" . $data->foto) 
                : asset("assets/img/contoh.jpeg");
        @endphp
        <div class="text-center mb-4 bg-light rounded-4 overflow-hidden shadow-sm" style="border: 1px solid #f0f0f0;">
          <img src="{{ $foto }}" class="img-cover w-100" style="max-height: 500px; object-fit: contain; background: #f8f9fa;">
        </div>

        <!-- ISI -->
        <div class="content mb-5" style="font-size: 16px; line-height: 1.8; color: #333; text-align: justify;">
          {!! nl2br(e($data->konten)) !!}
        </div>

        <!-- SHARE -->
        <div class="d-flex justify-content-between align-items-center mb-5 p-4 bg-light rounded-4 shadow-sm border" style="border-color: #f0f0f0 !important;">
          <a href="{{ route('berita') }}" class="btn btn-outline-dark rounded-pill px-4 fw-medium transition-btn">
            <i class="bi bi-arrow-left me-1"></i> Kembali
          </a>

          @php
            $link = url('/berita/' . $data->slug);
            $share = urlencode($data->judul . " - " . $link);
          @endphp

          <a href="https://wa.me/?text={{ $share }}" target="_blank" class="btn text-white rounded-pill px-4 fw-medium transition-btn" style="background:#25D366;">
            <i class="bi bi-whatsapp me-1"></i> Bagikan
          </a>
        </div>

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
              <a href="{{ route('berita.show', $r->slug) }}" class="text-dark small text-decoration-none hover-danger" style="transition: 0.3s; line-height: 1.4;">
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
    .transition-btn {
      transition: all 0.3s ease;
    }
    .transition-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .sidebar {
      position: sticky;
      top: 100px;
    }
  </style>
  @endpush
</x-layout>
