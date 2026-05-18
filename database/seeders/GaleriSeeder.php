<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        $jsonData = File::get($path);
        $allData = json_decode($jsonData, true);

        $galeriTable = collect($allData)->firstWhere('name', 'galeri');

        if (!$galeriTable || !isset($galeriTable['data'])) {
            dd("Gagal menemukan data tabel 'galeri'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataGaleri = $galeriTable['data'];

        foreach ($dataGaleri as $item) {
            $cleanData = collect($item)->except(['id'])->toArray();
            
            Galeri::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataGaleri) . " data ke tabel galeri!");
    }
}
