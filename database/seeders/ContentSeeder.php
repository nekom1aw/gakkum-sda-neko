<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AktivitasSeeder::class,
            DataSeeder::class,
            KegiatanSeeder::class,
            PublikasiSeeder::class,
            SektorSeeder::class,
        ]);
    }
}
