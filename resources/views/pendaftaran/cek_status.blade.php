<x-layout>
  <div class="container py-5 mt-4 mb-5">

    <!-- Judul Utama -->
    <div class="text-center mb-4">
      <h2 class="fw-bold text-danger">Cek Status Pendaftaran</h2>
      <p class="text-muted">Masukkan email atau nomor telepon pendaftar untuk melihat status pendaftaran Anda</p>
    </div>

    <!-- Search Box -->
    <div class="mx-auto bg-white p-4" style="max-width: 600px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); border: 1px solid #f0f0f0;">
      <div class="fw-semibold d-flex align-items-center mb-2" style="font-size: 16px;">
        <i class="bi bi-search me-2 text-danger"></i> Pencarian Status
      </div>
      <p class="text-muted mb-3" style="font-size: 14px;">Gunakan Email atau nomor telepon untuk mencari status pendaftaran</p>
      
      <form method="POST" action="{{ route('pendaftaran.cek.submit') }}" class="d-flex">
        @csrf
        <input type="text" name="keyword" class="form-control me-2" style="border-radius: 8px;"
          placeholder="Masukkan email atau nomor telepon pendaftar" required value="{{ $keyword ?? '' }}">
        <button type="submit" class="btn text-white d-flex align-items-center" style="background-color: #ff6b6b; border-radius: 8px; padding: 8px 20px;" onmouseover="this.style.backgroundColor='#ff4d4d'" onmouseout="this.style.backgroundColor='#ff6b6b'">
          <i class="bi bi-search me-1"></i> Cari
        </button>
      </form>
    </div>

    <div class="mt-4 mx-auto" style="max-width: 600px;">
        @if(isset($keyword))
            @if(isset($pendaftar) && $pendaftar)
                <div class='alert alert-info shadow-sm' style="border-radius: 12px;">
                    <h5 class="fw-bold mb-3">Hasil Pencarian:</h5>
                    <p class="mb-2"><b>Nama:</b> {{ $pendaftar->nama }}</p>
                    <p class="mb-2"><b>Email:</b> {{ $pendaftar->email }}</p>
                    <p class="mb-2"><b>No HP:</b> {{ $pendaftar->no_hp }}</p>
                    <p class="mb-0 mt-3"><b>Status Pendaftaran:</b> 
                        <span class='badge bg-{{ $pendaftar->status == 'diterima' ? 'success' : ($pendaftar->status == 'ditolak' ? 'danger' : 'secondary') }} px-3 py-2 rounded-pill' style="font-size: 13px;">
                            {{ ucfirst($pendaftar->status) }}
                        </span>
                    </p>
                </div>
            @else
                <div class='alert alert-danger shadow-sm' style="border-radius: 12px;">
                    Data tidak ditemukan. Pastikan email atau nomor HP yang dimasukkan benar.
                </div>
            @endif
        @endif
    </div>

  </div>

  @push('styles')
  <style>
    body {
      background-color: #f8f9fa;
    }
  </style>
  @endpush
</x-layout>
