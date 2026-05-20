<x-layout>

    {{-- HERO --}}
    <section class="py-5 text-white position-relative overflow-hidden"
        style="background: linear-gradient(135deg, #b91c1c 0%, #ef4444 60%, #fca5a5 100%); min-height: 280px;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('/assets/img/gambarkontak.jpg') center/cover no-repeat; opacity: 0.15; z-index:0;"></div>
        <div class="container position-relative text-center py-4" style="z-index:1;">
            <span class="badge bg-white text-danger px-3 py-2 mb-3 rounded-pill fw-semibold">
                <i class="bi bi-building me-1"></i> Tentang Kami
            </span>
            <h1 class="display-5 fw-bold mb-2">Profil Organisasi</h1>
            <p class="lead mb-0 opacity-75">KKO PAUD Kota Semarang</p>

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center mb-0" style="font-size:0.9rem;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}" class="text-white text-decoration-none opacity-75">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active text-white">Profil</li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- SEJARAH SINGKAT --}}
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="text-danger fw-semibold small text-uppercase letter-spacing-1">
                        <i class="bi bi-clock-history me-1"></i> Sejarah
                    </span>
                    <h2 class="fw-bold mt-1 mb-3">Mengenal KKO PAUD Kota Semarang</h2>
                    <p class="text-muted lh-lg">
                        KKO PAUD (Kelompok Kerja Operator Pendidikan Anak Usia Dini) Kota Semarang adalah
                        organisasi profesional yang menghimpun para operator PAUD se-Kota Semarang.
                        Berdiri sebagai wadah kolaborasi dan peningkatan kompetensi, KKO PAUD hadir untuk
                        menjawab tantangan era digitalisasi di bidang pendidikan anak usia dini.
                    </p>
                    <p class="text-muted lh-lg">
                        Melalui berbagai program pelatihan, pendampingan teknis, dan sinergi dengan Dinas
                        Pendidikan Kota Semarang, KKO PAUD berkomitmen meningkatkan kualitas pengelolaan
                        administrasi dan data PAUD secara valid, cepat, dan akurat.
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-3 p-3 bg-danger bg-opacity-10 rounded-4">
                                <i class="bi bi-people-fill text-danger fs-3"></i>
                                <div>
                                    <div class="fw-bold fs-5 text-danger">34+</div>
                                    <div class="small text-muted">Anggota Aktif</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-3 p-3 bg-danger bg-opacity-10 rounded-4">
                                <i class="bi bi-calendar-check-fill text-danger fs-3"></i>
                                <div>
                                    <div class="fw-bold fs-5 text-danger">2022</div>
                                    <div class="small text-muted">Tahun Berdiri</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="/assets/img/gambarkontak.jpg" alt="KKO PAUD"
                        class="img-fluid rounded-4 shadow" style="max-height: 380px; object-fit: cover; width:100%;">
                </div>
            </div>
        </div>
    </section>

    {{-- VISI MISI TUJUAN --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Visi, Misi & Tujuan</h2>
                <p class="text-muted">Landasan gerak dan arah perjuangan KKO PAUD Kota Semarang</p>
            </div>

            <div class="row g-4">
                {{-- Visi --}}
                <div class="col-md-4">
                    <div class="h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-danger">
                        <div class="text-center mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 rounded-circle"
                                style="width:64px; height:64px;">
                                <i class="bi bi-eye-fill text-danger fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold text-center mb-3">Visi</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Mewujudkan Kelompok Kerja Operator PAUD yang Handal dan Solid</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Berkualitas dalam Pengelolaan Administrasi Sekolah Berbasis IPTEK</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="col-md-4">
                    <div class="h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-danger">
                        <div class="text-center mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 rounded-circle"
                                style="width:64px; height:64px;">
                                <i class="bi bi-bullseye text-danger fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold text-center mb-3">Misi</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Meningkatkan Profesionalisme SDM Operator dalam Bidang TIK</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Membangun Jaringan Komunikasi dan Informasi</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Menjamin Mitra Kerja dengan Pemangku Kepentingan</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Penyampaian Informasi Secara Cepat, Tepat, dan Akurat</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Meningkatkan Validitas Data dan Solidaritas dalam Bekerja</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Tujuan --}}
                <div class="col-md-4">
                    <div class="h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-danger">
                        <div class="text-center mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 rounded-circle"
                                style="width:64px; height:64px;">
                                <i class="bi bi-flag-fill text-danger fs-3"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold text-center mb-3">Tujuan</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Menjembatani antara pihak sekolah dengan instansi terkait</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Meningkatkan kinerja operator dalam administrasi sekolah</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Menyajikan data yang valid serta dapat dipercaya</span>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Memperkenalkan keberadaan sekolah PAUD di Kota Semarang</span>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-danger me-2 mt-1 flex-shrink-0"></i>
                                <span>Mempercepat penyajian data sekolah</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SAMBUTAN KETUA --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Sambutan Ketua Umum</h2>
                <p class="text-muted">Pesan dan harapan dari pimpinan KKO PAUD Kota Semarang</p>
            </div>
            <div class="row align-items-start g-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <img src="/assets/img/ketuakko_viveno.jpg" alt="Viveno Susilo"
                        class="img-fluid rounded-4 shadow-sm mb-3" style="max-width:220px; object-fit:cover;">
                    <h5 class="fw-bold mb-0">Viveno Susilo, S.E</h5>
                    <small class="text-muted">Ketua Umum KKO PAUD Kota Semarang</small>
                </div>
                <div class="col-md-8">
                    <div class="bg-light p-4 rounded-4 border-start border-4 border-danger">
                        <p class="mb-3">Assalamu'alaikum warahmatullahi wabarakatuh,<br>
                            Salam sejahtera bagi kita semua,<br>
                            Namo Buddhaya, Om Swastiastu Om, Salam kebajikan.</p>

                        <p class="mb-3">Puji syukur kepada Tuhan Yang Maha Kuasa atas segala rahmat dan
                            berkat-Nya kepada kita semua, para pengurus dan anggota KKO PAUD, sehingga kita
                            masih dapat berbagi, masih terus bekerja cerdas demi kemajuan kita bersama.</p>

                        <p class="mb-3">Perkembangan dunia internet sangat pesat dan menjadi salah satu
                            indikator kemajuan teknologi informasi dan komunikasi di Indonesia. Internet
                            sebagai media informasi super cepat telah menjadi salah satu kebutuhan pokok
                            informasi bagi siapa pun tanpa terkecuali.</p>

                        <p class="mb-3">Berkenaan dengan itu, sebagai organisasi yang memberikan perhatian
                            penuh terhadap aspek peningkatan kompetensi TIK, KKO PAUD meluncurkan website
                            ini guna memenuhi kebutuhan akan informasi yang terkait dengan Dapodik, NISN,
                            E-Rapor, NUPTK, SIMPKB, dan semua informasi seputar dunia pendidikan.</p>

                        <p class="mb-3">Harapan kami, dengan diluncurkannya website ini, KKO PAUD dapat
                            menjadi sumber informasi yang berkaitan dengan hal-hal di atas. Melalui tim IT
                            kami akan berusaha untuk selalu melakukan pembaruan secara berkala sehingga
                            pengguna dan masyarakat luas dapat melihat perkembangan digitalisasi pendidikan.</p>

                        <p class="mb-0 fw-semibold">Semarang, 12 Maret 2022<br>Ketua Umum<br>Viveno Susilo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- NAVIGASI CEPAT ke sub-halaman Profil --}}
    <section class="py-5 bg-danger text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-2">Jelajahi Lebih Lanjut</h3>
            <p class="opacity-75 mb-4">Informasi lengkap tentang anggota dan legalitas organisasi</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('anggota') }}"
                    class="btn btn-white btn-lg rounded-pill px-5 fw-semibold text-danger"
                    style="background:#fff;">
                    <i class="bi bi-people-fill me-2"></i> Lihat Anggota
                </a>
                <a href="{{ route('legalitas.index') }}"
                    class="btn btn-outline-light btn-lg rounded-pill px-5 fw-semibold">
                    <i class="bi bi-file-earmark-text-fill me-2"></i> Lihat Legalitas
                </a>
            </div>
        </div>
    </section>

</x-layout>
