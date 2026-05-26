<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kegiatan')->insert([

            [
                'kategori' => 'aktivitas',

                'jenis_kegiatan_id' => 'Audiensi',
                'jenis_kegiatan_en' => 'Audience',

                'tanggal' => '2025-08-01',

                'image_id' => 'photos/aktivitas-1.jpg',
                'image_en' => 'photos/aktivitas-1.jpg',

                'title_id' => 'Audiensi Bersama DPR RI',
                'title_en' => 'Audience With Indonesian Parliament',

                'deskripsi_id' => 'Pembahasan mengenai penegakan hukum lingkungan hidup dan tata kelola SDA.',
                'deskripsi_en' => 'Discussion about environmental law enforcement and natural resource governance.',

                'content_id' => '
                    <p>
                        Kegiatan audiensi dilakukan bersama DPR RI
                        untuk membahas penguatan penegakan hukum
                        lingkungan hidup di Indonesia.
                    </p>
                ',

                'content_en' => '
                    <p>
                        Audience activity with the Indonesian Parliament
                        discussing stronger environmental law enforcement.
                    </p>
                ',

                'status' => 'publish',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori' => 'aktivitas',

                'jenis_kegiatan_id' => 'Workshop',
                'jenis_kegiatan_en' => 'Workshop',

                'tanggal' => '2025-08-03',

                'image_id' => 'photos/aktivitas-2.jpg',
                'image_en' => 'photos/aktivitas-2.jpg',

                'title_id' => 'Workshop Investigasi Tambang',
                'title_en' => 'Mining Investigation Workshop',

                'deskripsi_id' => 'Pelatihan investigasi aktivitas pertambangan ilegal.',
                'deskripsi_en' => 'Training on illegal mining investigation.',

                'content_id' => '
                    <p>
                        Workshop investigasi dilakukan untuk meningkatkan
                        kapasitas tim dalam melakukan investigasi lapangan.
                    </p>
                ',

                'content_en' => '
                    <p>
                        Investigation workshop to improve field investigation
                        capacity for the internal team.
                    </p>
                ',

                'status' => 'publish',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori' => 'aktivitas',

                'jenis_kegiatan_id' => 'Diskusi',
                'jenis_kegiatan_en' => 'Discussion',

                'tanggal' => '2025-08-06',

                'image_id' => 'photos/aktivitas-3.jpg',
                'image_en' => 'photos/aktivitas-3.jpg',

                'title_id' => 'Diskusi Penanganan Karhutla',
                'title_en' => 'Forest Fire Handling Discussion',

                'deskripsi_id' => 'Diskusi bersama organisasi masyarakat sipil mengenai karhutla.',
                'deskripsi_en' => 'Discussion with civil society organizations regarding forest fires.',

                'content_id' => '
                    <p>
                        Diskusi membahas strategi penanganan kebakaran hutan
                        dan lahan di beberapa wilayah Indonesia.
                    </p>
                ',

                'content_en' => '
                    <p>
                        Discussion about handling forest and land fires
                        in several Indonesian regions.
                    </p>
                ',

                'status' => 'draft',

                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}