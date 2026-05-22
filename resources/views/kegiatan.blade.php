<x-layout>
  <!-- HERO -->
  <section id="hero" class="text-center" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%); padding-top: 70px; padding-bottom: 20px;">
    <div class="circle"></div>
    <div class="container position-relative" style="z-index:1;">
      <span class="tagline d-inline-block bg-danger-subtle text-danger px-3 py-1 rounded-pill fw-semibold mb-3">Kegiatan</span>
      <h1 class="hero-title fw-bolder text-dark" style="font-size: 2.8rem; margin-bottom: 0.2rem;">Kegiatan</h1>
      <h1 class="hero-subtitle fw-bolder text-danger" style="font-size: 2.8rem;">KKO PAUD Kota Semarang</h1>
      <p class="hero-desc text-muted mx-auto mt-4" style="max-width: 600px; font-size: 1.1rem;">
        Ikuti berbagai kegiatan menarik dan dapatkan informasi terbaru seputar perkembangan KKO Paud Kota Semarang.
      </p>
    </div>
  </section>

  <!-- CARD KEGIATAN -->
  <div class="container mt-3 mb-5">
    <div class="row g-4 justify-content-center">
      @forelse($semua_kegiatan as $row)
        @php
          $fotoList = !empty($row->foto) ? explode(",", $row->foto) : [];
          $fotoUtama = (!empty($fotoList[0]) && file_exists(public_path('assets/foto_kegiatan/' . $fotoList[0])))
                        ? asset('assets/foto_kegiatan/' . $fotoList[0])
                        : asset('assets/img/contoh.jpeg');

          $tgl = date("d M Y", strtotime($row->tanggal));
          $jam = date("H:i", strtotime($row->jam));
        @endphp
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card shadow-sm rounded-4 h-100">
            <div class="card-img-wrapper position-relative" style="width: 100%; height: 200px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; overflow: hidden; border-top-left-radius: inherit; border-top-right-radius: inherit;">
                <img src="{{ $fotoUtama }}" alt="{{ $row->nama_kegiatan }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
              <span class="badge {{ (strtotime($row->tanggal) >= time()) ? 'bg-primary' : 'bg-success' }} position-absolute top-0 end-0 m-3">
                  {{ (strtotime($row->tanggal) >= time()) ? 'Mendatang' : 'Selesai' }}
              </span>
              @if(count($fotoList) > 1)
                <span class="badge bg-info position-absolute bottom-0 end-0 m-2">
                  +{{ count($fotoList) - 1 }} foto
                </span>
              @endif
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $row->nama_kegiatan }}</h5>
              <p class="mb-1 text-muted"><i class="bi bi-calendar-event text-danger"></i> {{ $tgl }}</p>
              <p class="mb-1 text-muted"><i class="bi bi-clock text-danger"></i> {{ $jam }} WIB</p>
              <p class="mb-1 text-muted"><i class="bi bi-geo-alt text-danger"></i> {{ $row->tempat }}</p>
              <p class="card-text">{{ Str::limit(strip_tags($row->deskripsi), 120) }}</p>
            
              @php
                $materiList = !empty($row->materi) ? explode(",", $row->materi) : [];
              @endphp
              
              @if(!empty($materiList[0]))
                <div class="mt-3">
                  <strong><i class="bi bi-paperclip"></i> Materi:</strong>
                  <ul class="mb-0 ps-3">
                    @foreach($materiList as $index => $m)
                      @if(!empty(trim($m)))
                        <li>
                          <a href="{{ asset('assets/materi_kegiatan/' . trim($m)) }}" target="_blank" class="text-decoration-none text-primary">
                            📄 File {{ $index + 1 }}
                          </a>
                        </li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              @endif

            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-between">
              <a href="{{ route('kegiatan.show', $row->id) }}" class="btn btn-danger w-75">
                <i class="bi bi-eye"></i> Detail
              </a>
              <div class="dropdown">
                <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-share"></i>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item"
                      href="https://wa.me/?text={{ urlencode($row->nama_kegiatan . ' - Lihat detail di: ' . url('/kegiatan/' . $row->id)) }}"
                      target="_blank">
                      <i class="bi bi-whatsapp text-success"></i> WhatsApp
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
            <p class='text-center text-muted'>Belum ada kegiatan.</p>
        </div>
      @endforelse
    </div>
  </div>
</x-layout>