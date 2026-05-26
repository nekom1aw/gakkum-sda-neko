<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kegiatan')->insert([

            [
                'kategori' => 'bincang-hukum',

                'jenis_kegiatan_id' => 'Diskusi',
                'jenis_kegiatan_en' => 'Discussion',

                'image_id' => 'photos/bincang-hukum-1.jpg',
                'image_en' => 'photos/bincang-hukum-1.jpg',

                'tanggal' => '2025-08-01',

                'title_id' => 'Tantangan Penegakan Hukum Tata Ruang',
                'title_en' => 'Spatial Law Enforcement Challenges',

                'deskripsi_id' => 'Diskusi mengenai penegakan hukum tata ruang dan lingkungan hidup.',
                'deskripsi_en' => 'Discussion about spatial law enforcement and environment.',

                'content_id' => '<p>Isi lengkap bincang hukum pertama.</p>',
                'content_en' => '<p>Full content first legal discussion.</p>',

                'status' => 'publish',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori' => 'bincang-hukum',

                'jenis_kegiatan_id' => 'Webinar',
                'jenis_kegiatan_en' => 'Webinar',

                'image_id' => 'photos/bincang-hukum-2.jpg',
                'image_en' => 'photos/bincang-hukum-2.jpg',

                'tanggal' => '2025-08-03',

                'title_id' => 'Mengurai Benang Kusut Pemulihan Lingkungan',
                'title_en' => 'Untangling Environmental Recovery',

                'deskripsi_id' => 'Pembahasan pemulihan lingkungan hidup pasca pencemaran.',
                'deskripsi_en' => 'Discussion on environmental recovery after pollution.',

                'content_id' => '<p>Isi lengkap bincang hukum kedua.</p>',
                'content_en' => '<p>Full content second legal discussion.</p>',

                'status' => 'publish',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori' => 'bincang-hukum',

                'jenis_kegiatan_id' => 'Podcast',
                'jenis_kegiatan_en' => 'Podcast',

                'image_id' => 'photos/bincang-hukum-3.jpg',
                'image_en' => 'photos/bincang-hukum-3.jpg',

                'tanggal' => '2025-08-05',

                'title_id' => 'Menelisik Pencucian Uang di SDA',
                'title_en' => 'Investigating Money Laundering in Natural Resources',

                'deskripsi_id' => 'Diskusi mengenai tindak pidana pencucian uang sektor SDA.',
                'deskripsi_en' => 'Discussion about money laundering in natural resources sector.',

                'content_id' => '<p>Isi lengkap bincang hukum ketiga.</p>',
                'content_en' => '<p>Full content third legal discussion.</p>',

                'status' => 'draft',

                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}