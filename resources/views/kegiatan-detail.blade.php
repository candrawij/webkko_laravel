<x-layout>
  @php
    $tgl = date("d M Y", strtotime($kegiatan->tanggal));
    $jam = date("H:i", strtotime($kegiatan->jam)) . " WIB";
  @endphp

  <!-- DETAIL KEGIATAN -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm rounded-4 border-0">
          <!-- Carousel Gambar -->
          <div id="carouselKegiatan" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              @php
                $fotoList = explode(",", $kegiatan->foto);
                $isFirst = true;
              @endphp
              
              @foreach($fotoList as $fotoItem)
                @php
                  $fotoPath = (!empty(trim($fotoItem)) && file_exists(public_path("assets/foto_kegiatan/" . trim($fotoItem))))
                    ? asset("assets/foto_kegiatan/" . trim($fotoItem))
                    : asset("assets/img/contoh.jpeg");
                @endphp
                <div class="carousel-item {{ $isFirst ? 'active' : '' }}">
                  <img src="{{ $fotoPath }}" class="d-block w-100 rounded-top-4" style="height: 400px; object-fit: contain; background: #f8f9fa;" alt="Gambar kegiatan">
                </div>
                @php
                  $isFirst = false;
                @endphp
              @endforeach
            </div>
            <!-- Tombol Navigasi -->
            @if(count($fotoList) > 1)
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselKegiatan" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 20px;"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselKegiatan" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); border-radius: 50%; padding: 20px;"></span>
                <span class="visually-hidden">Next</span>
              </button>
            @endif
          </div>

          <div class="card-body p-4">
            <h4 class="card-title fw-bold mb-3">{{ $kegiatan->nama_kegiatan }}</h4>
            <div class="d-flex flex-wrap gap-3 mb-4">
                <span class="text-muted"><i class="bi bi-calendar-event text-danger me-1"></i> {{ $tgl }}</span>
                <span class="text-muted"><i class="bi bi-clock text-danger me-1"></i> {{ $jam }}</span>
                <span class="text-muted"><i class="bi bi-geo-alt text-danger me-1"></i> {{ $kegiatan->tempat }}</span>
            </div>
            
            <div class="card-text mb-4" style="line-height: 1.8;">
              {{-- Using {!! !!} to allow basic HTML rendering if needed, or nl2br for newlines --}}
              {!! nl2br(e($kegiatan->deskripsi)) !!}
            </div>
          
            <!-- Bagian Materi -->
            <div class="mt-4 p-3 bg-light rounded-3">
              <strong class="d-block mb-2"><i class="bi bi-link-45deg text-danger me-1"></i> Link Materi:</strong>
              @php
                $materiList = !empty($kegiatan->materi) ? explode(",", $kegiatan->materi) : [];
              @endphp
              
              @if(!empty($materiList[0]))
                <ul class="mb-0">
                  @foreach($materiList as $index => $m)
                    @if(!empty(trim($m)))
                      <li class="mb-1">
                        <a href="{{ asset('assets/materi_kegiatan/' . trim($m)) }}" target="_blank" class="text-decoration-none text-danger fw-semibold">
                          📄 Unduh Materi {{ $index + 1 }}
                        </a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              @else
                <p class="text-muted small mb-0">Belum ada materi tersedia.</p>
              @endif
            </div>
          </div>
            
          <div class="card-footer bg-white border-top-0 p-4 pt-0 d-flex justify-content-between align-items-center">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
              <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <div class="btn-group shadow-sm rounded-pill">
              <!-- Share WhatsApp -->
              <a href="https://wa.me/?text={{ urlencode($kegiatan->nama_kegiatan . ' - ' . url('/kegiatan/' . $kegiatan->id)) }}"
                target="_blank" class="btn btn-success" title="Share ke WhatsApp">
                <i class="bi bi-whatsapp"></i>
              </a>
              <!-- Share Facebook -->
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/kegiatan/' . $kegiatan->id)) }}"
                target="_blank" class="btn btn-primary" title="Share ke Facebook">
                <i class="bi bi-facebook"></i>
              </a>
              <!-- Share Instagram -->
              <a href="https://www.instagram.com/kkopaudsemarang" target="_blank" class="btn" style="background: #e1306c; color: white;"
                title="Instagram KKO PAUD">
                <i class="bi bi-instagram"></i>
              </a>
              <!-- Copy Link -->
              <button class="btn btn-dark" onclick="copyLink()" title="Salin Link">
                <i class="bi bi-link-45deg"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    function copyLink() {
      const link = "{{ url('/kegiatan/' . $kegiatan->id) }}";
      navigator.clipboard.writeText(link).then(function () {
        alert("Link berhasil disalin: " + link);
      }, function () {
        alert("Gagal menyalin link.");
      });
    }
  </script>
  @endpush
</x-layout>
