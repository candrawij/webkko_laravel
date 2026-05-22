<x-filament-panels::page>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
        .custom-pendaftar .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>

    <div class="custom-pendaftar mt-2">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-danger text-white text-center py-3">
                <h4 class="mb-0 fw-bold" style="color: white;">Pendaftar KKO PAUD Kota Semarang</h4>
            </div>
            <div class="card-body p-4 bg-white dark:bg-gray-800">

                <!-- Filter Status -->
                @php
                    $filter = request('filter', 'Semua');
                @endphp
                <div class="mb-4 d-flex align-items-center">
                    <label for="filter" class="form-label mb-0 me-3 fw-bold dark:text-white">Filter Status:</label>
                    <select id="filter" class="form-select w-auto shadow-sm" onchange="window.location.href='?filter='+this.value">
                        <option value="Semua" {{ ($filter == 'Semua') ? 'selected' : '' }}>Semua</option>
                        <option value="Menunggu" {{ ($filter == 'Menunggu') ? 'selected' : '' }}>Menunggu</option>
                        <option value="Diterima" {{ ($filter == 'Diterima') ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ ($filter == 'Ditolak') ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-danger text-center align-middle">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $query = \App\Models\Pendaftar::query();
                                
                                if ($filter == 'Menunggu') {
                                    $query->whereNull('status')
                                          ->orWhere('status', '')
                                          ->orWhere('status', 'Menunggu');
                                    $query->orderBy('id', 'desc');
                                } elseif ($filter != 'Semua') {
                                    $query->where('status', $filter)->orderBy('id', 'desc');
                                } else {
                                    $query->orderBy('id', 'asc');
                                }
                                
                                $pendaftars = $query->get();
                                $no = 1;
                            @endphp

                            @foreach ($pendaftars as $row)
                                @php
                                    $id = $row->id;
                                    $statusDisplay = empty($row->status) ? 'Menunggu' : $row->status;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td><strong>{{ $row->nama }}</strong></td>
                                    <td>{{ $row->tempat_lahir }}, {{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->pendidikan_terakhir }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->tanggal_daftar ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($statusDisplay == 'Diterima')
                                            <span class="badge bg-success">{{ $statusDisplay }}</span>
                                        @elseif($statusDisplay == 'Ditolak')
                                            <span class="badge bg-danger">{{ $statusDisplay }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ $statusDisplay }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button onclick="confirmUpdate('{{ route('admin.pendaftar.action') }}?update_id={{ $id }}&status=Diterima', 'menerima')" 
                                                    class="btn btn-outline-success btn-sm" title="Terima">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                            <button onclick="confirmUpdate('{{ route('admin.pendaftar.action') }}?update_id={{ $id }}&status=Ditolak', 'menolak')" 
                                                    class="btn btn-outline-danger btn-sm" title="Tolak">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $id }}" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade text-start" id="modalHapus{{ $id }}" data-bs-backdrop="static" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form method="post" action="{{ route('admin.pendaftar.action') }}">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-dark">
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            Yakin ingin menghapus <strong>{{ $row->nama }}</strong>?
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
                            
                            @if($pendaftars->isEmpty())
                                <tr>
                                    <td colspan="11" class="text-center py-4 text-muted">Data pendaftar belum tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for Modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmUpdate(url, action) {
            if (confirm("Apakah Anda yakin ingin " + action + " pendaftar ini?")) {
                window.location.href = url;
            }
        }
    </script>
</x-filament-panels::page>
