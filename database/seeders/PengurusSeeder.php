<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan nama file sudah sesuai dengan file aslimu
        $path = database_path('seeders/data/kkosemarang_web.json');
        
        // Jika file tidak ada, langsung kunci dengan error tebal di terminal
        if (!File::exists($path)) {
            throw new \Exception("File JSON tidak ditemukan di jalur: " . $path);
        }

        $jsonData = File::get($path);
        $allData = json_decode($jsonData, true);

        // Cek apakah JSON rusak (misal ada koma sisa di akhir data phpMyAdmin)
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Format JSON Rusak/Invalid: " . json_last_error_msg());
        }

        // 2. Cari objek tabel yang memiliki "name" = "pengurus"
        $pengurusTable = collect($allData)->firstWhere('name', 'pengurus');

        // Jika tabel pengurus tidak ditemukan di dalam file JSON tersebut
        if (!$pengurusTable || !isset($pengurusTable['data'])) {
            dd("Gagal menemukan data tabel 'pengurus'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataPengurus = $pengurusTable['data'];

        // 3. Eksekusi penyisipan data jika semua pengecekan di atas lolos
        foreach ($dataPengurus as $item) {
            // Hapus id agar MySQL membuat Auto Increment baru yang rapi
            $cleanData = collect($item)->except(['id'])->toArray();
            
            Pengurus::create($cleanData);
        }

        // Menampilkan info sukses di terminal
        $this->command->info("Berhasil menyalin " . count($dataPengurus) . " data ke tabel pengurus!");
    }
}
