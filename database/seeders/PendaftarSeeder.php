<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/kkosemarang_web.json');

        $jsonData = File::get($path);
        $allData = json_decode($jsonData, true);
        
        $pendaftarTable = collect($allData)->firstWhere('name', 'anggota');
        
        if (!$pendaftarTable || !isset($pendaftarTable['data'])) {
            dd("Gagal menemukan data tabel 'pendaftar'. Isi JSON yang terbaca adalah:", $allData);
        }

        $dataPendaftar = $pendaftarTable['data'];

        foreach ($dataPendaftar as $item) {
            $cleanData = collect($item)->except(['id', 'tanggal_daftar'])->toArray();

            if(isset($cleanData['status'])) {
                $statusLama = strtolower(trim($cleanData['status']));

                if($statusLama === 'menunggu') {
                    $cleanData['status'] = 'pending';
                }
            }

            $tanggalLama = $item['tanggal_daftar'] ?? null;

            if ($tanggalLama) {
                try {
                    $carbonDate = Carbon::parse($tanggalLama);

                    $cleanData['created_at'] = $carbonDate;
                    $cleanData['updated_at'] = $carbonDate;
                }catch (\Exception $e) {
                    $cleanData['created_at'] = Carbon::now();
                    $cleanData['updated_at'] = Carbon::now();
                }
            }
            
            Pendaftar::create($cleanData);
        }

        $this->command->info("Berhasil menyalin " . count($dataPendaftar) . " data ke tabel pendaftar!");
    }
}
