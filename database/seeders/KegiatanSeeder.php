<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        if (!file_exists($path)) {
            throw new \Exception("File JSON tidak ditemukan di jalur: " . $path);
        }

        $jsonData = File::get($path);
        $allData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Format JSON Rusak/Invalid: " . json_last_error_msg());
        }

        $kegiatanTable = collect($allData)->firstWhere('name', 'kegiatan');

        if (!$kegiatanTable || !isset($kegiatanTable['data'])) {
            dd("Gagal menemukan data tabel 'kegiatan'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataKegiatan = $kegiatanTable['data'];

        foreach ($dataKegiatan as $item) {
            $cleanData = collect($item)->except(['id'])->toArray();
            
            Kegiatan::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataKegiatan) . " data ke tabel kegiatan!");
    }
}
