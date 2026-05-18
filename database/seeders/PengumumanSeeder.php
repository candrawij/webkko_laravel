<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        $jsonData = File::get($path);
        $allData = json_decode($jsonData, true);

        $pengumumanTable = collect($allData)->firstWhere('name', 'pengumuman');

        if (!$pengumumanTable || !isset($pengumumanTable['data'])) {
            dd("Gagal menemukan data tabel 'pengumuman'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataPengumuman = $pengumumanTable['data'];

        foreach ($dataPengumuman as $item) {
            $cleanData = collect($item)->except(['id'])->toArray();
            
            Pengumuman::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataPengumuman) . " data ke tabel pengumuman!");
    }
}
