<x-layout>
  <!-- HERO -->
  <section id="hero" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%); padding-top: 60px; padding-bottom: 40px; text-align: center;">
    <div class="container">
      <span class="d-inline-block bg-danger-subtle text-danger px-3 py-1 rounded-pill fw-semibold mb-3" style="font-size: 14px;">Dokumen Resmi</span>
      <h1 class="fw-bolder text-dark" style="font-size: 2.8rem; margin-bottom: 0.2rem;">Legalitas</h1>
      <h1 class="fw-bolder text-danger" style="font-size: 2.8rem;">KKO PAUD Kota Semarang</h1>
      <p class="text-muted mx-auto mt-4" style="max-width: 600px; font-size: 1.1rem;">
        Berikut adalah dokumen resmi legalitas organisasi KKO PAUD Kota Semarang yang telah disahkan.
      </p>
    </div>
  </section>

  <!-- LIST LEGALITAS -->
  <div class="container my-5" style="margin-top: 30px !important;">
    <div class="row justify-content-center g-4">
      @foreach ($legalDocuments as $doc)
        <div class="col-md-4">
          <div class="card shadow-sm rounded-4 h-100">
            <div class="position-relative">
              <div class="bg-light d-flex align-items-center justify-content-center"
                   style="height:200px; border-radius: 12px 12px 0 0;">
                <i class="bi {{ $doc->icon }} text-danger" style="font-size:60px;"></i>
              </div>
              <span class="badge bg-danger position-absolute top-0 start-0 m-2">{{ $doc->badge }}</span>
            </div>
            <div class="card-body text-center">
              <h5 class="fw-bold">{{ $doc->title }}</h5>
              <p class="text-muted">{{ $doc->description }}</p>
            </div>
            <div class="card-footer bg-white border-0 d-flex gap-2 px-3 pb-3">
              <a href="{{ route('legalitas.download', ['nama_file' => $doc->file]) }}" target="_blank" class="btn btn-outline-danger w-50">
                <i class="bi bi-eye"></i> Lihat
              </a>
              <a href="{{ route('legalitas.download', ['nama_file' => $doc->file]) }}" download class="btn btn-danger w-50">
                <i class="bi bi-download"></i> Download
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-layout>