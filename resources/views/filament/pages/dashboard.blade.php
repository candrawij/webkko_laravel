<x-filament-panels::page>
    @php
        $jumlah_pengurus = \App\Models\Pengurus::count();
        $jumlah_pendaftar = \App\Models\Pendaftar::count();
        $jumlah_kegiatan = \App\Models\Kegiatan::whereMonth('tanggal', now()->month)->count();
        $jumlah_galeri = \App\Models\Galeri::count();
        $jumlah_user = \App\Models\User::count();
        // Fallback untuk tabel buku_tamu karena belum ada di skema Laravel
        $tamu_hari_ini = 0; 
    @endphp

    <style>
        .custom-dashboard {
            font-family: 'Poppins', sans-serif;
        }
        .custom-dashboard .card {
            border: none;
            border-radius: 12px;
            transition: 0.3s;
        }
        .custom-dashboard .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.05) !important;
        }
        .custom-dashboard h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
            color: #1a1a1a;
        }
        .custom-dashboard .bg-danger h3 {
            color: #fff;
        }
        .custom-dashboard p {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .custom-dashboard .bg-danger p {
            color: rgba(255,255,255,0.8);
        }
    </style>

    <div class="custom-dashboard">

      <!-- HEADER -->
      <div class="mb-5">
        <p class="text-gray-500 dark:text-gray-400">Ringkasan Sistem KKO PAUD Semarang</p>
      </div>

      <!-- STATISTIK -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

        <div class="card shadow-sm bg-white dark:bg-gray-800 p-6">
            <p class="dark:text-gray-400">Total Pengurus</p>
            <h3 class="dark:text-white">{{ $jumlah_pengurus }}</h3>
        </div>

        <div class="card shadow-sm bg-white dark:bg-gray-800 p-6">
            <p class="dark:text-gray-400">Total Pendaftar</p>
            <h3 class="dark:text-white">{{ $jumlah_pendaftar }}</h3>
        </div>

        <div class="card shadow-sm bg-white dark:bg-gray-800 p-6">
            <p class="dark:text-gray-400">Kegiatan Bulan Ini</p>
            <h3 class="dark:text-white">{{ $jumlah_kegiatan }}</h3>
        </div>

        <div class="card shadow-sm bg-white dark:bg-gray-800 p-6">
            <p class="dark:text-gray-400">Total Galeri</p>
            <h3 class="dark:text-white">{{ $jumlah_galeri }}</h3>
        </div>

        <div class="card shadow-sm bg-white dark:bg-gray-800 p-6">
            <p class="dark:text-gray-400">Total User</p>
            <h3 class="dark:text-white">{{ $jumlah_user }}</h3>
        </div>

        <div class="card shadow-sm p-6" style="background-color: #dc3545; color: white;">
            <p style="color: rgba(255,255,255,0.9);">Tamu Hari Ini</p>
            <h3 id="tamu_hari_ini" style="color: white;">{{ $tamu_hari_ini }}</h3>
        </div>

      </div>
    <br>
      <!-- ANALYTICS SIMPLE -->
      <div class="card shadow-sm bg-white dark:bg-gray-800 p-6 mt-4">
          <h5 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Analytics Buku Tamu</h5>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
              <h6 class="text-center font-semibold text-gray-700 dark:text-gray-300 mb-4">Event Terdaftar</h6>
              <div class="flex justify-center">
                  <canvas id="chartEvent" style="max-height: 250px;"></canvas>
              </div>
            </div>

            <div>
              <h6 class="text-center font-semibold text-gray-700 dark:text-gray-300 mb-4">Status Kehadiran</h6>
              <div class="flex justify-center">
                  <canvas id="chartStatus" style="max-height: 250px;"></canvas>
              </div>
            </div>

          </div>
      </div>

    </div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let chartEvent = new Chart(document.getElementById('chartEvent'), {
            type: 'bar',
            data: { 
                labels: ['Event A', 'Event B', 'Event C'], 
                datasets: [{ 
                    label: 'Pendaftar Event', 
                    data: [12, 19, 3],
                    backgroundColor: 'rgba(220, 53, 69, 0.7)'
                }] 
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        let chartStatus = new Chart(document.getElementById('chartStatus'), {
            type: 'pie',
            data: { 
                labels: ['Hadir', 'Tidak Hadir'], 
                datasets: [{ 
                    data: [{{ $tamu_hari_ini > 0 ? $tamu_hari_ini : 15 }}, 5],
                    backgroundColor: ['#198754', '#dc3545']
                }] 
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Catatan: Karena api_dashboard.php dan tabel buku_tamu belum ada di Laravel, 
        // saya mengisikan data dummy statis agar chart dapat ditampilkan dengan cantik.
    });
    </script>
</x-filament-panels::page>
