<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-2">
    <div class="container">

        <a class="navbar-brand fw-bold text-danger d-flex align-items-center gap-2" href="/">
            <img src="/assets/img/logo.jpg" alt="Logo" width="35" height="35" class="me-2 rounded-circle">
            <span class="d-none d-sm-block">KKO PAUD Kota Semarang</span>
        </a>

        <button type="button"
            class="navbar-toggler border-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto align-items-center gap-2 gap-lg-1 fw-normal">

                {{-- Beranda --}}
                <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>

                {{-- Profil Dropdown --}}
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil') || request()->is('anggota') || request()->is('legalitas') ? 'active text-danger fw-semibold' : 'text-dark' }}"
                        href="{{ url('/profil') }}"
                        id="profilDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 py-2" aria-labelledby="profilDropdown">
                        <li>
                            <a class="dropdown-item py-2 px-4 {{ request()->is('anggota') ? 'text-danger fw-semibold' : '' }}"
                                href="{{ url('/anggota') }}">
                                <i class="bi bi-people-fill me-2 text-danger"></i> Anggota
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-4 {{ request()->is('legalitas') ? 'text-danger fw-semibold' : '' }}"
                                href="{{ url('/legalitas') }}">
                                <i class="bi bi-file-earmark-text-fill me-2 text-danger"></i> Legalitas
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Menu lainnya --}}
                <x-nav-link href="/kegiatan" :active="request()->is('kegiatan')">Kegiatan</x-nav-link>
                <x-nav-link href="/berita" :active="request()->is('berita')">Berita</x-nav-link>
                <x-nav-link href="/galeri" :active="request()->is('galeri')">Galeri</x-nav-link>
                <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>

                {{-- Login / Dashboard --}}
                @if(auth()->check())
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn btn-success rounded-pill px-4">
                        Ke Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-outline-danger rounded-pill px-4">
                        Login
                    </a>
                @endif

            </div>
        </div>

    </div>
</nav>