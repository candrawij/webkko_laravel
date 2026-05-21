<x-layout>
  <!-- HERO -->
  <section id="hero" class="text-center">
    <div class="circle"></div>
    <div class="container position-relative" style="z-index:1;">
      <span class="tagline">Kegiatan & Berita</span>
      <h1 class="hero-title">Kegiatan</h1>
      <h1 class="hero-subtitle">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc">
        Ikuti berbagai kegiatan menarik dan dapata informasi terbaru seputar perkembangan KKO Paud Kota Semarang.
      </p>
    </div>
  </section>

  <!-- CARD KEGIATAN -->
  <div class="container py-5">
      <h2 class="fw-bold text-center mb-5">Kegiatan Komunitas KKO Semarang</h2>

      <div class="row g-4">
          @forelse($semua_kegiatan as $kegiatan)
              <div class="col-md-4">
                  <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                      
                     {{-- Menampilkan Foto Utama Kegiatan --}}
                        @if($kegiatan->foto)
                            @php
                                // 1. Gunting dulu datanya SEBELUM melakukan pengecekan
                                $array_foto = explode(',', $kegiatan->foto);
                                $foto_sampul = basename(trim($array_foto[0]));
                                
                                // 2. Buat alamat fisik file di folder public/kegiatan/ (folder luar)
                                $lokasi_fisik = public_path('storage/kegiatan/' . $foto_sampul);
                            @endphp

                            {{-- 3. Baru kita cek, apakah file potongan pertama tadi beneran ada di laptop? --}}
                            @if(file_exists($lokasi_fisik))
                                <img src="{{ route('kegiatan.foto', ['nama_file' => $foto_sampul]) }}" 
                                    class="card-img-top" 
                                    alt="{{ $kegiatan->nama_kegiatan }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                {{-- Jika di database ada namanya, tapi file fotonya terhapus/hilang dari folder --}}
                                <div class="bg-secondary-subtle d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            
                        @else
                            {{-- Jika di database memang kolom fotonya kosong/NULL --}}
                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                      <div class="card-body d-flex flex-column">
                          <div class="text-muted small mb-2">
                              <i class="bi bi-calendar3"></i> 
                              {{-- Mengubah format tanggal agar lebih rapi dibaca manusia --}}
                              {{ date('d M Y', strtotime($kegiatan->tanggal)) }}
                          </div>
                          
                          <h5 class="card-title fw-bold text-dark">{{ $kegiatan->nama_kegiatan }}</h5>
                          
                          {{-- Membatasi teks deskripsi agar tidak terlalu panjang di halaman depan --}}
                          <p class="card-text text-muted small flex-grow-1">
                              {{ Str::limit(strip_tags($kegiatan->deskripsi), 120, '...') }}
                          </p>

                          {{-- Tombol Link menuju halaman detail kegiatan --}}
                          <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-outline-primary btn-sm rounded-pill mt-3 w-100">
                              Baca Selengkapnya
                          </a>
                      </div>
                  </div>
              </div>
          @empty
              <div class="col-12 text-center py-5">
                  <p class="text-muted fs-5">Belum ada agenda atau kegiatan yang dicatat saat ini.</p>
              </div>
          @endforelse
      </div>
  </div>
</x-layout>