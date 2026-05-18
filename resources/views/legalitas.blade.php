<x-layout>
  <section id="hero">
    <div class="container">
      <span class="tagline">Dokumen Resmi</span>
      <h1 class="hero-title">Legalitas</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Berikut adalah dokumen resmi legalitas organisasi KKO PAUD Kota Semarang yang telah disahkan.
      </p>
    </div>
  </section>

  <div class="container my-5">
      <div class="row justify-content-center g-4">
          @forelse ($legalDocuments as $doc)
              <div class="col-md-4">
                  <div class="card shadow-sm rounded-4 h-100 border-0">
                      <div class="position-relative">
                          {{-- Bagian Icon File Placeholder --}}
                          <div class="bg-light d-flex align-items-center justify-content-center"
                              style="height:200px; border-radius: 16px 16px 0 0;">
                              <i class="bi bi-file-earmark-pdf text-danger" style="font-size:60px;"></i>
                          </div>
                          
                          {{-- Menggunakan Object Property khas Laravel (->) bukan array (['']) --}}
                          <span class="badge bg-danger position-absolute top-0 start-0 m-3">
                              {{ $doc->badge }}
                          </span>
                      </div>
                      
                      <div class="card-body text-center">
                          <h5 class="fw-bold text-dark">{{ $doc->title }}</h5>
                          <p class="text-muted small mb-0">{{ $doc->description }}</p>
                      </div>
                      
                      <div class="card-footer bg-white border-0 pb-3 d-flex justify-content-center">
                          {{-- Mengarahkan link download ke DocumentController via Route demi keamanan data --}}
                          <a href="{{ route('legalitas.download', $doc->file) }}" class="btn btn-danger w-100 rounded-pill">
                              <i class="bi bi-download me-1"></i> Unduh Dokumen
                          </a>
                      </div>
                  </div>
              </div>
          @empty
              {{-- Antisipasi jika data dokumen di database masih kosong --}}
              <div class="col-12 text-center py-4">
                  <p class="text-muted">Belum ada dokumen legalitas yang diunggah.</p>
              </div>
          @endforelse
      </div>
  </div>
</x-layout>