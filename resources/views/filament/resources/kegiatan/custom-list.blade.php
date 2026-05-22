<x-filament-panels::page>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
        .custom-kegiatan .pagination .page-link {
            color: #dc3545;
        }
        .custom-kegiatan .pagination .page-link:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .custom-kegiatan .pagination .page-item.active .page-link {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .custom-kegiatan .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>

    <div class="custom-kegiatan mt-2">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-danger text-white text-center py-3">
                <h4 class="mb-0 fw-bold" style="color: white;">Kegiatan KKO PAUD Kota Semarang</h4>
            </div>
            <div class="card-body p-4 bg-white dark:bg-gray-800">

                <button type="button" class="btn btn-danger mb-4 px-4 py-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg me-2"></i> Tambah Kegiatan
                </button>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-danger text-center align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Tempat</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Materi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $hlm = request('hlm', 1);
                                $limit = 10;
                                $start = ($hlm - 1) * $limit;
                                
                                $query = \App\Models\Kegiatan::orderBy('tanggal', 'asc');
                                $total_records = $query->count();
                                $kegiatans = $query->skip($start)->take($limit)->get();
                                $no = $start + 1;
                            @endphp

                            @foreach ($kegiatans as $row)
                                @php
                                    $id = $row->id;
                                    $fotoList = array_filter(explode(",", $row->foto));
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td><strong>{{ $row->nama_kegiatan }}</strong></td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ date('H:i', strtotime($row->jam)) }}</td>
                                    <td>{{ $row->tempat }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($row->deskripsi, 50, '...') }}</td>
                                    <td class="text-center">
                                        @if (!empty($fotoList))
                                            <div class="position-relative d-inline-block">
                                                <img src="{{ asset('assets/foto_kegiatan/' . $fotoList[0]) }}" width="80" class="rounded shadow-sm" style="object-fit: cover; height: 60px;">
                                                @if (count($fotoList) > 1)
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger shadow-sm border border-light">
                                                        +{{ count($fotoList) - 1 }}
                                                    </span>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (!empty($row->materi))
                                            <a href="{{ asset('assets/materi_kegiatan/' . $row->materi) }}" target="_blank" class="text-decoration-none text-danger fw-semibold" title="Buka Materi">
                                                <i class="bi bi-file-earmark-text me-1"></i> File
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button type="button" title="Edit" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button type="button" title="Delete" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Edit -->
                                        <div class="modal fade text-start" id="modalEdit{{ $id }}" tabindex="-1" data-bs-backdrop="static">
                                            <div class="modal-dialog modal-lg">
                                                <form method="post" action="{{ route('admin.kegiatan.action') }}?hlm={{ $hlm }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Edit Kegiatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-dark">
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            <input type="hidden" name="foto_lama" value="{{ $row->foto }}">
                                                            <input type="hidden" name="materi_lama" value="{{ $row->materi }}">

                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Nama Kegiatan</label>
                                                                <input type="text" name="nama_kegiatan" value="{{ $row->nama_kegiatan }}" class="form-control" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fw-semibold">Tanggal</label>
                                                                    <input type="date" name="tanggal" value="{{ $row->tanggal }}" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fw-semibold">Jam</label>
                                                                    <input type="time" name="jam" value="{{ $row->jam }}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Tempat</label>
                                                                <input type="text" name="tempat" value="{{ $row->tempat }}" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Deskripsi</label>
                                                                <textarea name="deskripsi" rows="3" class="form-control" required>{{ $row->deskripsi }}</textarea>
                                                            </div>

                                                            <!-- Materi -->
                                                            <div class="mb-3 p-3 bg-light rounded border">
                                                                <label class="form-label fw-semibold">File Materi (Baru)</label>
                                                                <input type="file" name="materi" class="form-control mb-2" accept=".pdf,.doc,.docx,.ppt,.pptx">
                                                                @if (!empty($row->materi))
                                                                    <div class="d-flex align-items-center gap-2 mt-2 p-2 bg-white rounded border-start border-4 border-info shadow-sm">
                                                                        <i class="bi bi-file-earmark-check text-info ms-1"></i>
                                                                        <span class="small fw-semibold text-muted">File Lama:</span>
                                                                        <a href="{{ asset('assets/materi_kegiatan/' . $row->materi) }}" target="_blank" class="small text-decoration-none text-truncate" style="max-width: 200px;">
                                                                            {{ $row->materi }}
                                                                        </a>
                                                                        <a href="{{ route('admin.kegiatan.action', ['hapus_materi_id' => $id, 'file' => $row->materi, 'hlm' => $hlm]) }}" 
                                                                           onclick="return confirm('Hapus file materi ini?')" class="btn btn-sm btn-outline-danger ms-auto px-2 py-0" title="Hapus File Materi">
                                                                           <i class="bi bi-trash" style="font-size: 12px;"></i>
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <span class="small text-muted fst-italic">Belum ada file materi</span>
                                                                @endif
                                                            </div>

                                                            <!-- Foto Lama -->
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Foto Tersimpan</label>
                                                                <div class="d-flex flex-wrap gap-2 mt-1">
                                                                    @forelse ($fotoList as $f)
                                                                        @if (!empty($f) && file_exists(public_path("assets/foto_kegiatan/$f")))
                                                                            <div class="position-relative border rounded p-1 shadow-sm">
                                                                                <img src="{{ asset('assets/foto_kegiatan/' . $f) }}" style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                                                                <a href="{{ route('admin.kegiatan.action', ['hapus_foto_id' => $id, 'foto' => $f, 'hlm' => $hlm]) }}" 
                                                                                   onclick="return confirm('Hapus foto ini?')" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-decoration-none border border-light">
                                                                                    <i class="bi bi-x"></i>
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @empty
                                                                        <span class="small text-muted fst-italic">Belum ada foto</span>
                                                                    @endforelse
                                                                </div>
                                                            </div>

                                                            <div class="mb-2">
                                                                <label class="form-label fw-semibold">Tambah Foto Baru</label>
                                                                <input type="file" name="foto[]" class="form-control" multiple accept="image/*">
                                                                <small class="text-muted">Bisa memilih lebih dari satu foto sekaligus.</small>
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
                                        <div class="modal fade text-start" id="modalHapus{{ $id }}" tabindex="-1" data-bs-backdrop="static">
                                            <div class="modal-dialog">
                                                <form method="post" action="{{ route('admin.kegiatan.action') }}?hlm={{ $hlm }}">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-dark">
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            Yakin ingin menghapus seluruh data dan foto untuk kegiatan <strong>{{ $row->nama_kegiatan }}</strong>?
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

                            @if($kegiatans->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-muted">Data kegiatan belum tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade text-start" id="modalTambah" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <form method="post" action="{{ route('admin.kegiatan.action') }}?hlm={{ $hlm }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold text-dark">Tambah Kegiatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-dark">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Nama Kegiatan</label>
                                        <input type="text" name="nama_kegiatan" class="form-control" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-semibold">Jam</label>
                                            <input type="time" name="jam" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Tempat</label>
                                        <input type="text" name="tempat" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Deskripsi</label>
                                        <textarea name="deskripsi" rows="3" class="form-control" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">File Materi <small class="text-muted">(opsional)</small></label>
                                        <input type="file" name="materi" class="form-control" accept=".pdf,.doc,.docx,.ppt,.pptx">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label fw-semibold">Foto Kegiatan</label>
                                        <input type="file" name="foto[]" class="form-control" multiple accept="image/*">
                                        <small class="text-muted">Gunakan tombol Ctrl atau tahan tap pada layar untuk memilih banyak foto sekaligus.</small>
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
                    <p class="mb-0 text-muted">Total Kegiatan : {{ $total_records }}</p>
                    <nav>
                        <ul class="pagination mb-0">
                            @php
                                $jumlah_page = ceil($total_records / $limit);
                                $jumlah_page = $jumlah_page > 0 ? $jumlah_page : 1;
                            @endphp

                            <!-- First / Prev -->
                            @if ($hlm == 1)
                                <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="?hlm=1">First</a></li>
                                <li class="page-item"><a class="page-link" href="?hlm={{ $hlm - 1 }}">&laquo;</a></li>
                            @endif

                            <!-- Pages -->
                            @for ($i = 1; $i <= $jumlah_page; $i++)
                                <li class="page-item{{ ($hlm == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="?hlm={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Next / Last -->
                            @if ($hlm >= $jumlah_page)
                                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="?hlm={{ $hlm + 1 }}">&raquo;</a></li>
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
