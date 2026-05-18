<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        $judul = $this->faker->sentence(6); // Membuat kalimat 6 kata
        
        return [
            'judul' => $judul,
            'slug' => Str::slug($judul), // Mengubah "Judul Berita" menjadi "judul-berita"
            'penulis' => $this->faker->name(),
            'konten' => $this->faker->paragraphs(5, true), // Membuat 5 paragraf teks
            'foto' => null, // Biarkan null dulu atau isi dengan nama file dummy
            'kategori' => 'berita',
            'status' => 'published',
            'is_highlighted' => $this->faker->boolean(20), // Peluang 20% menjadi highlight (1)
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
