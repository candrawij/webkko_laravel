<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PendaftarSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Cek apakah user dengan email ini sudah ada
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        $this->call([
            PengurusSeeder::class,
            KegiatanSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            GaleriSeeder::class,
            PendaftarSeeder::class,
            EventSeeder::class,
            BukuTamuSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
