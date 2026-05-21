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
    <div class="container py-5"><div class="container my-5">
        <h2 class="fw-bold text-center mb-5">Kegiatan Komunitas KKO Semarang</h2>

        <div class="row g-4 justify-content-center">
            @forelse($semua_kegiatan as $kegiatan)
                @php
                    // 1. Pecah string koma dari database menjadi array list foto
                    $fotoList = $kegiatan->foto ? array_filter(explode(',', $kegiatan->foto)) : [];
                    
                    // 2. Set foto default (placeholder) jika tidak ada foto valid yang ditemukan
                    $fotoUtama = asset('assets/img/logo.jpg'); 
                    
                    // 3. Cari foto pertama dari list yang beneran ada fisiknya di folder storage/kegiatan
                    foreach ($fotoList as $fotoItem) {
                        $nama_file = basename(trim($fotoItem));
                        if (!empty($nama_file) && file_exists(public_path('storage/kegiatan/' . $nama_file))) {
                            // Jika ketemu yang valid, gunakan rute jembatan kita
                            $fotoUtama = route('kegiatan.foto', ['nama_file' => $nama_file]);
                            break; 
                        }
                    }

                    // 4. Hitung sisa foto untuk penanda badge "+X foto"
                    $jumlahSisaFoto = count($fotoList) - 1;
                    
                    // 5. Tentukan apakah kegiatan mendatang atau sudah selesai
                    $isMendatang = strtotime($kegiatan->tanggal) >= time();
                @endphp

                <div class="col-md-4">
                    <div class="card shadow-sm rounded-4 h-100 border-0">
                        <div class="position-relative">
                            {{-- Render Foto Utama hasil seleksi loop di atas --}}
                            <img src="{{ $fotoUtama }}" class="card-img-top rounded-top-4" alt="{{ $kegiatan->nama_kegiatan }}" style="height: 200px; object-fit: cover;">
                            
                            {{-- Badge Status Kegiatan (Mendatang / Selesai) --}}
                            <span class="badge {{ $isMendatang ? 'bg-primary' : 'bg-success' }} position-absolute top-0 end-0 m-3">
                                {{ $isMendatang ? 'Mendatang' : 'Selesai' }}
                            </span>

                            {{-- Badge Jumlah Sisa Foto (Hanya muncul jika foto lebih dari 1) --}}
                            @if(count($fotoList) > 1)
                                <span class="badge bg-info position-absolute bottom-0 end-0 m-2">
                                    +{{ $jumlahSisaFoto }} foto
                                </span>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark">{{ $kegiatan->nama_kegiatan }}</h5>
                            
                            <p class="mb-1 text-muted small">
                                <i class="bi bi-calendar-event text-danger"></i> {{ date('d M Y', strtotime($kegiatan->tanggal)) }}
                            </p>
                            <p class="mb-1 text-muted small">
                                <i class="bi bi-clock text-danger"></i> {{ date('H:i', strtotime($kegiatan->waktu)) }} WIB
                            </p>
                            <p class="mb-1 text-muted small">
                                <i class="bi bi-geo-alt text-danger"></i> {{ $kegiatan->lokasi ?? $kegiatan->tempat }}
                            </p>
                            
                            <p class="card-text text-muted small flex-grow-1 mt-2">
                                {{ Str::limit(strip_tags($kegiatan->deskripsi), 120, '...') }}
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between p-3">
                            <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-danger w-75 rounded-pill">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            
                            {{-- Dropdown Share Media Sosial --}}
                            <div class="dropdown">
                                <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-share"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="https://wa.me/?text={{ urlencode($kegiatan->nama_kegiatan.' - Lihat detail di: '.route('kegiatan.show', $kegiatan->id)) }}" target="_blank">
                                            <i class="bi bi-whatsapp text-success"></i> WhatsApp
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('kegiatan.show', $kegiatan->id)) }}" target="_blank">
                                            <i class="bi bi-facebook text-primary"></i> Facebook
                                        </a>
                                    </li>
                                </ul>
                            </div>
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