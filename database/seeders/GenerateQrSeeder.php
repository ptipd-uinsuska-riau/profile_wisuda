<?php

namespace Database\Seeders;

use App\Models\GenerateQr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenerateQrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\GenerateQr::factory(10)->create();
        GenerateQr::create([
            'name' => 'c5b498d637c214c911111dce6b9cbc490abb6b0e',
        ]);
    }
}
