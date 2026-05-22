<x-filament-panels::page>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
        .custom-pengurus .pagination .page-link {
            color: #dc3545;
        }
        .custom-pengurus .pagination .page-link:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .custom-pengurus .pagination .page-item.active .page-link {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .custom-pengurus .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
        }
        .custom-pengurus-wrapper {
            /* Mencegah konflik css filament dengan bootstrap di modal */
        }
    </style>

    <div class="custom-pengurus custom-pengurus-wrapper mt-2">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-danger text-white text-center py-3 rounded-top-4">
                <h4 class="mb-0 fw-bold" style="color: white;">Pengurus KKO PAUD Kota Semarang</h4>
            </div>
            <div class="card-body p-4 bg-white dark:bg-gray-800">

                <!-- Tombol Tambah -->
                <button type="button" class="btn btn-danger mb-4 px-4 py-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg me-2"></i> Tambah Pengurus
                </button>

                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-danger text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pendidikan</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $hlm = request('hlm', 1);
                            $limit = 15;
                            $limit_start = ($hlm - 1) * $limit;
                            
                            $query = \App\Models\Pengurus::orderByRaw("
                                CASE
                                    WHEN jabatan LIKE 'Pembina%' THEN 1
                                    WHEN jabatan LIKE 'Ketua Umum%' THEN 2
                                    WHEN jabatan LIKE 'Ketua Harian%' THEN 3
                                    WHEN jabatan LIKE 'Sekretaris%' THEN 4
                                    WHEN jabatan LIKE 'Bendahara%' THEN 5
                                    WHEN jabatan LIKE 'Bidang%' THEN 6
                                    WHEN jabatan LIKE 'Anggota%' THEN 7
                                    ELSE 99
                                END
                            ")->orderBy('id', 'asc');
                            
                            $total_records = $query->count();
                            $penguruses = $query->skip($limit_start)->take($limit)->get();
                            $no = $limit_start + 1;
                            @endphp

                            @foreach ($penguruses as $row)
                                @php
                                    $id = $row->id;
                                    $fotoPath = public_path('assets/foto_pengurus/' . $row->foto);
                                    $fotoUrl = asset('assets/foto_pengurus/' . $row->foto);
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td><strong>{{ $row->nama }}</strong></td>
                                    <td>{{ $row->jabatan }}</td>
                                    <td>{{ $row->pendidikan_terakhir }}</td>
                                    <td class="text-center">
                                        @if(!empty($row->foto) && file_exists($fotoPath))
                                            <img src="{{ $fotoUrl }}" width="60" class="rounded shadow-sm" style="object-fit: cover; height: 60px;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" title="Edit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button type="button" title="Delete" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade text-start" id="modalEdit{{ $id }}" data-bs-backdrop="static" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form method="post" action="{{ route('admin.pengurus.action') }}?hlm={{ $hlm }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Edit Pengurus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-dark">
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            <input type="hidden" name="foto_lama" value="{{ $row->foto }}">

                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Nama</label>
                                                                <input type="text" name="nama" class="form-control" value="{{ $row->nama }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Jabatan</label>
                                                                <input type="text" name="jabatan" class="form-control" value="{{ $row->jabatan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Pendidikan Terakhir</label>
                                                                <input type="text" name="pendidikan_terakhir" class="form-control" value="{{ $row->pendidikan_terakhir }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Ganti Foto</label>
                                                                <input type="file" name="foto" class="form-control" accept="image/*">
                                                                @if(!empty($row->foto) && file_exists($fotoPath))
                                                                    <div class="mt-2">
                                                                        <img src="{{ $fotoUrl }}" width="80" class="rounded shadow-sm">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" name="simpan" value="1" class="btn btn-danger">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade text-start" id="modalHapus{{ $id }}" data-bs-backdrop="static" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form method="post" action="{{ route('admin.pengurus.action') }}?hlm={{ $hlm }}">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-dark">
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            <input type="hidden" name="foto" value="{{ $row->foto }}">
                                                            Yakin ingin menghapus "<strong>{{ $row->nama }}</strong>"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" name="hapus" value="1" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            
                            @if($penguruses->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Data pengurus belum tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade text-start" id="modalTambah" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="post" action="{{ route('admin.pengurus.action') }}?hlm={{ $hlm }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold text-dark">Tambah Pengurus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-dark">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Pendidikan Terakhir</label>
                                        <input type="text" name="pendidikan_terakhir" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Foto</label>
                                        <input type="file" name="foto" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="simpan" value="1" class="btn btn-danger">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
                    <p class="mb-0 text-muted">Total Pengurus : {{ $total_records }}</p>
                    <nav>
                        <ul class="pagination mb-0">
                            @php
                            $jumlah_page = ceil($total_records / $limit);
                            $jumlah_number = 1;
                            $start_number = ($hlm > $jumlah_number) ? $hlm - $jumlah_number : 1;
                            $end_number = ($hlm < ($jumlah_page - $jumlah_number)) ? $hlm + $jumlah_number : $jumlah_page;
                            @endphp

                            <!-- Tombol First dan Previous -->
                            @if ($hlm == 1)
                                <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            @else
                                @php $prev = $hlm - 1; @endphp
                                <li class="page-item"><a class="page-link" href="?hlm=1">First</a></li>
                                <li class="page-item"><a class="page-link" href="?hlm={{ $prev }}">&laquo;</a></li>
                            @endif

                            <!-- Nomor halaman -->
                            @for ($i = $start_number; $i <= $end_number; $i++)
                                @php $active = ($hlm == $i) ? ' active' : ''; @endphp
                                <li class="page-item{{ $active }}"><a class="page-link" href="?hlm={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            <!-- Tombol Next dan Last -->
                            @if ($hlm == $jumlah_page || $jumlah_page == 0)
                                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
                            @else
                                @php $next = $hlm + 1; @endphp
                                <li class="page-item"><a class="page-link" href="?hlm={{ $next }}">&raquo;</a></li>
                                <li class="page-item"><a class="page-link" href="?hlm={{ $jumlah_page }}">Last</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for Modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-filament-panels::page>
