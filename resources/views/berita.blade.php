<x-layout>
    <div id="hero" class="py-5" style="background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);">
        <div class="container">
            <h2 class="fw-bold">KKO PAUD KOTA SEMARANG</h2>
            <small class="text-danger fw-bold">VALID DAN AKURAT</small>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                
                {{-- Bagian Highlight --}}
                @if($highlight)
                    <div class="mb-4 pb-3 border-bottom">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('berita', $highlight->slug) }}">
                                    <img src="{{ $highlight->gambar ? asset('storage/berita/'.$highlight->gambar) : asset('assets/img/logo.jpg') }}" class="img-fluid rounded shadow-sm">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h4 class="fw-bold">
                                    <a href="{{ route('berita', $highlight->slug) }}" class="text-dark text-decoration-none hover-danger">
                                        {{ $highlight->judul }}
                                    </a>
                                </h4>
                                <small class="text-muted">📅 {{ $highlight->created_at->format('d M Y') }}</small>
                                <p class="mt-2 text-secondary">
                                    {{ Str::limit(strip_tags($highlight->konten), 150) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- List Berita --}}
                @foreach($berita_list as $item)
                    <div class="mb-4 pb-3 border-bottom">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('berita', $item->slug) }}">
                                    <img src="{{ $item->gambar ? asset('storage/berita/'.$item->placeholder) : asset('assets/img/logo.jpg') }}" class="img-fluid rounded" style="height: 180px; object-fit: cover; width: 100%;">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h5 class="fw-bold">
                                    <a href="{{ route('berita', $item->slug) }}" class="text-dark text-decoration-none">
                                        {{ $item->judul }}
                                    </a>
                                </h5>
                                <small class="text-muted">📅 {{ $item->created_at->format('d M Y') }}</small>
                                <p class="mt-2 small">
                                    {{ Str::limit(strip_tags($item->konten), 120) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Link Navigasi Halaman --}}
                <div class="d-flex justify-content-center">
                    {{ $berita_list->links() }}
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar p-4 border rounded bg-white shadow-sm">
                    <h6 class="fw-bold mb-3 border-start border-danger border-4 ps-2">Cari Berita</h6>
                    <form action="/berita/search" method="GET">
                        <input type="text" name="query" class="form-control mb-4" placeholder="Ketik kata kunci...">
                    </form>

                    <h6 class="fw-bold mb-3 border-start border-danger border-4 ps-2">Postingan Terbaru</h6>
                    @foreach($recent as $r)
                        <div class="mb-2 pb-2 border-bottom">
                            <a href="{{ route('berita', $r->slug) }}" class="text-dark small text-decoration-none hover-danger">
                                {{ $r->judul }}
                            </a>
                        </div>
                    @endforeach

                    <div class="mt-4 p-3 bg-light rounded">
                        <h6 class="fw-bold">Info</h6>
                        <p class="small text-muted mb-0">Portal resmi KKO PAUD Kota Semarang. Wadah kolaborasi operator PAUD.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

@push('styles')
<style>
    .hover-danger:hover { color: #dc3545 !important; transition: 0.3s; }
</style>
@endpush