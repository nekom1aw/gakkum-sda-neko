<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('publikasi')->insert([
            [
                'category' => 'kiprah',
                'status' => 'publish',

                'slug_id' => Str::slug('Tentang Kiprah Kami'),
                'slug_en' => Str::slug('About Our Work'),

                'image_id' => 'kiprah-id.jpg',
                'image_en' => 'kiprah-en.jpg',

                'title_id' => 'Tentang Kiprah Kami',
                'title_en' => 'About Our Work',

                'description_id' => 'Deskripsi singkat kiprah dalam bahasa Indonesia.',
                'description_en' => 'Short description of our work in English.',

                'content_id' => '<p>Konten lengkap kiprah bahasa Indonesia.</p>',
                'content_en' => '<p>Full English content about our work.</p>',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
