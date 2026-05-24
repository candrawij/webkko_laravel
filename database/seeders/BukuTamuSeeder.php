<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuTamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        $bukuTamuTable = collect($data)->firstWhere('name', 'buku_tamu');

        if (!$bukuTamuTable || !isset($bukuTamuTable['data'])) {
            dd("Gagal menemukan data tabel 'buku_tamu'. Isi JSON yang terbaca adalah:", $data);
        }

        $dataBukuTamu = $bukuTamuTable['data'];

        foreach ($dataBukuTamu as $item) {
            $cleanData = collect($item)->except(['id'])->toArray();
            \App\Models\BukuTamu::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataBukuTamu) . " data ke tabel buku_tamu!");
    }
}
