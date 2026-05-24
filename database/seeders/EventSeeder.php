<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        $jsonData = file_get_contents($path);
        $allData = json_decode($jsonData, true);

        $eventTable = collect($allData)->firstWhere('name', 'event_buku_tamu');
        if (!$eventTable || !isset($eventTable['data'])) {
            dd("Gagal menemukan data tabel 'event'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataEvent = $eventTable['data'];

        foreach ($dataEvent as $item) {
            $cleanData = collect($item)->except(['id', 'token', 'created_by'])->toArray();

            $namaEvent = $item['nama_event'] ?? 'event-tanpa-nama';

            $cleanData['slug'] = Str::slug($namaEvent) . '-' . Str::lower(Str::random(5));
            
            Event::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataEvent) . " data ke tabel event!");
    }
}
