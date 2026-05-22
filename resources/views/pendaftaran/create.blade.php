<x-layout>
  <div class="container py-5">
    <div class="card mx-auto shadow-sm" style="max-width: 600px; border-radius: 20px; animation: fadeInUp 0.8s ease;">
      <div class="card-header text-white text-center py-3 fw-bold border-0" style="background: #f44336; border-top-left-radius: 20px; border-top-right-radius: 20px;">
        <h5 class="mb-0 fw-bold">📋 Formulir Pendaftaran Anggota</h5>
        <small>KKO PAUD Kota Semarang</small>
      </div>
      <div class="card-body p-4 bg-white" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
        
        @if(session('success'))
          <div class='alert alert-success text-center'>
              ✅ {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach($errors->all() as $error)
                      <li>❌ {{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('pendaftaran.store') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required value="{{ old('nama') }}">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" required value="{{ old('tempat_lahir') }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" class="form-control" placeholder="Contoh: S1 - Pendidikan PAUD" required value="{{ old('pendidikan_terakhir') }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">No HP</label>
              <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor handphone" required value="{{ old('no_hp') }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Masukkan email" required value="{{ old('email') }}">
            </div>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-danger text-white py-2 fw-bold" style="border-radius: 12px; transition: 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">Daftar Sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('styles')
  <style>
    body {
      background: linear-gradient(180deg, #fde8e9 0%, #fff 100%);
    }
    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
  @endpush
</x-layout>
