<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'nama' => 'Dyah Ratna Harimurti, S.Sos, M.AP', 'jabatan' => 'Pembina', 'foto' => '20250827172315.jpg', 'pendidikan_terakhir' => 'S2'],
            ['id' => 2, 'nama' => 'Viveno Susilo, S.E', 'jabatan' => 'Ketua Umum', 'foto' => '20250827144459.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 3, 'nama' => 'Murgiyanti, S.Pd, M.Pd', 'jabatan' => 'Ketua Harian', 'foto' => '20251005141957.jpg', 'pendidikan_terakhir' => 'S2'],
            ['id' => 4, 'nama' => 'Dewi Sulistiyowati, S.Pd', 'jabatan' => 'Sekretaris 1', 'foto' => '20250827144514.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 5, 'nama' => 'Ridhokah, S.Pd', 'jabatan' => 'Bendahara 1', 'foto' => '20250827144531.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 6, 'nama' => 'Dhanu Anggoro', 'jabatan' => 'Bendahara 2', 'foto' => '20250827172452.jpg', 'pendidikan_terakhir' => 'SMA'],
            ['id' => 7, 'nama' => 'Wisnu Wijaya, S.Ak', 'jabatan' => 'Bidang TIK', 'foto' => '20250827144602.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 8, 'nama' => 'Novi Prastopo', 'jabatan' => 'Bidang TIK 2', 'foto' => '20250827172351.jpg', 'pendidikan_terakhir' => 'SMK'],
            ['id' => 9, 'nama' => 'Aslamiyah, S.HI', 'jabatan' => 'Bidang TIK 3', 'foto' => '20250827172302.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 10, 'nama' => 'Muhammad Ainun Na\'im, S,Pd', 'jabatan' => 'Bidang Organisasi 1', 'foto' => '20250827144648.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 11, 'nama' => 'Sriwidodo', 'jabatan' => 'Bidang Organisasi 2', 'foto' => '20250827144707.jpg', 'pendidikan_terakhir' => 'SMA'],
            ['id' => 12, 'nama' => 'Budi Rahayu, S.E', 'jabatan' => 'Bidang Humas 1', 'foto' => '20250827144724.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 13, 'nama' => 'Herni, S.Pd', 'jabatan' => 'Bidang Humas 2', 'foto' => '20250827144751.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 14, 'nama' => 'Indah Roostiorini, A.Md', 'jabatan' => 'Bidang Humas 3', 'foto' => '20250827144810.jpg', 'pendidikan_terakhir' => 'D3'],
            ['id' => 15, 'nama' => 'Niken Lestari, S.Pd', 'jabatan' => 'Bidang Sosial, Ekonomi, dan Kemasyarakatan 1', 'foto' => '20250827145229.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 16, 'nama' => 'Suyati, S.Pd', 'jabatan' => 'Bidang Sosial, Ekonomi, dan Kemasyarakatan 2', 'foto' => '20250827172517.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 17, 'nama' => 'Khlara Martina Sagana, S.Psi', 'jabatan' => 'Bidang Pendidikan dan Pelatihan 1', 'foto' => '20250827172541.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 18, 'nama' => 'Susi Dewi, S.Pd', 'jabatan' => 'Bidang Pendidikan dan Pelatihan 2', 'foto' => '20250827144856.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 19, 'nama' => 'Oktarina Sakti N', 'jabatan' => 'Anggota', 'foto' => '20250827173437.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 20, 'nama' => 'Sri Hartini, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827154504.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 21, 'nama' => 'Oktarina Dwi Wiryawanti,S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827173536.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 23, 'nama' => 'Witono', 'jabatan' => 'Anggota', 'foto' => '20250827152540.jpg', 'pendidikan_terakhir' => 'SMK'],
            ['id' => 24, 'nama' => 'Silvia Dian Kumalasari, S.Gz, S.H', 'jabatan' => 'Anggota', 'foto' => '20250827172603.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 25, 'nama' => 'Sari Diajeng Hendratun, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827172625.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 26, 'nama' => 'Sungatmi, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827152622.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 27, 'nama' => 'Agustin Priharyanti, S.S', 'jabatan' => 'Anggota', 'foto' => '20250827172713.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 28, 'nama' => 'Evi Sulistiya Ariani, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827152656.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 29, 'nama' => 'Siti Zainun, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827152723.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 30, 'nama' => 'Chikmatun Fatihah', 'jabatan' => 'Anggota', 'foto' => '20250827172740.jpg', 'pendidikan_terakhir' => 'SMA'],
            ['id' => 31, 'nama' => 'Yeni Sukasih', 'jabatan' => 'Anggota', 'foto' => '20250827173603.jpg', 'pendidikan_terakhir' => 'D3'],
            ['id' => 32, 'nama' => 'Ika Nila Wardani, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827152801.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 33, 'nama' => 'Norma Setyarini, M.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827172812.jpg', 'pendidikan_terakhir' => 'S2'],
            ['id' => 34, 'nama' => 'Miftakhul Khasanah, S.Pd', 'jabatan' => 'Anggota', 'foto' => '20250827160419.jpg', 'pendidikan_terakhir' => 'S1'],
            ['id' => 70, 'nama' => 'Arwan Setyo Edi', 'jabatan' => 'Sekretaris 2', 'foto' => '20250904223212.jpg', 'pendidikan_terakhir' => 'SMA'],
        ];

        // Gunakan upsert untuk menghindari error duplicate entry jika seeder dijalankan berkali-kali
        Pengurus::upsert($data, ['id'], ['nama', 'jabatan', 'foto', 'pendidikan_terakhir']);

        $this->command->info("Berhasil menyalin " . count($data) . " data ke tabel pengurus!");
    }
}
