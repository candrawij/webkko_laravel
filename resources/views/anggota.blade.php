<x-layout>
  <!-- HERO -->
  <section id="hero" class="text-center">
    <div class="circle"></div>
    <div class="container position-relative" style="z-index:1;">
      <span class="tagline">Komunitas PAUD</span>
      <h1 class="hero-title">Anggota</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Profesional berpengalaman yang berkomitmen memajukan pendidikan anak usia dini di Kota Semarang
      </p>
      <div class="mt-4">
        <a href="../formpendaftaran.php" class="btn btn-join"><i class="bi bi-person-plus"></i> Bergabung dengan
          Kami</a>
        <a href="cek_status.php" class="btn btn-program-danger"><i class="bi bi-check-circle"></i> Cek Status
          Pendaftaran </a>
      </div>
    </div>
  </section>

  <!-- PENGURUS -->
  <section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">Kepemimpinan KKO PAUD</h2>
        <p class="text-muted mb-5">Tim kepemimpinan inti yang berpengalaman dan berdedikasi</p>

        <div class="row g-4">
            @forelse($semua_pengurus as $row)
                <div class="col-md-4">
                    <div class="p-4 h-100 shadow-sm rounded-4 bg-white border-0 card-hover">
                        
                        {{-- Logika Foto Terproteksi --}}
                        <div class="text-center mb-3">
                            {{-- 1. Gunakan Storage::disk('local') untuk mengecek folder privat storage/app/pengurus --}}
                            @if($row->foto && \Illuminate\Support\Facades\Storage::disk('local')->exists('pengurus/' . $row->foto))
                                {{-- 2. Tembak ke route jembatan pengurus.foto, bukan asset() publik --}}
                                <img src="{{ route('pengurus.foto', ['nama_file' => $row->foto]) }}" 
                                    alt="{{ $row->nama }}" 
                                    class="rounded-circle shadow-sm mb-2 mx-auto d-block"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                {{-- Avatar bawaan jika data foto kosong atau file fisik terhapus --}}
                                <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" 
                                    style="width: 100px; height: 100px;">
                                    <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>

                        <h5 class="fw-bold mb-1">{{ $row->nama }}</h5>
                        <span class="badge bg-danger-subtle text-danger mb-3">{{ $row->jabatan }}</span>

                        @if($row->pengalaman)
                            <p class="mb-1 small text-start"><strong>Pengalaman:</strong> {{ $row->pengalaman }}</p>
                        @endif
                        
                        @if($row->keahlian)
                            <p class="mb-0 small text-start"><strong>Keahlian:</strong> {{ $row->keahlian }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-muted">Data kepemimpinan belum tersedia.</p>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{ $semua_pengurus->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
  </section>
</x-layout>