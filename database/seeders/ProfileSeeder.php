<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::insert([
            'nim' => '11910123197',
            'nama' => 'ANGGI MAHARANI AGUSTINA',
            'jk' => 'P',
            'ayah' => 'RAMADHAN HUTASUHUT',
            'prediket' => 'CUM LAUDE',
            'foto' => 'https://drive.google.com/uc?id=1Omk8bgFio0Ay1Ym-8zGNJMEbI0_haxOI',
            'fakultas' => 'TARBIYAH DAN KEGURUAN',
            'prodi' => 'PENDIDIKAN AGAMA ISLAM',
            'smt' => '7',
            'tgl_lulus' => '2023-01-12',
            'ipk' => '3,75',
            'tgl_skl' => '2023-01-30 11:08:59',
            'tgl_validasi' => '2023-01-30 17:00:11',
            'periode' => '5',
            'tahun_akademik' => 'JUNI 2024',
            'keterangan' => '2023/2024',
            'semester' => '2022-1',
        ]);
    }
}
