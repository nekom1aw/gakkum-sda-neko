<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SEBARAN KASUS
        DB::table('publikasi')->insert([

            'category' => 'data',

            'status' => 'publish',

            'slug_id' => 'sebaran-kasus',
            'slug_en' => 'case-distribution',

            'title_id' => 'Sebaran Kasus',
            'title_en' => 'Case Distribution',

            'description_id' => '
                <p>
                    Database sebaran kasus sektor sumber daya alam dan lingkungan.
                </p>
            ',

            'description_en' => '
                <p>
                    Distribution database of natural resources and environmental cases.
                </p>
            ',

            'content_id' => '
                <iframe
                    src="https://datastudio.google.com/embed/reporting/d8f9f1ef-eb69-46b1-aac4-3d142277d168/page/W4sjC"
                    width="100%"
                    height="1800"
                    frameborder="0"
                ></iframe>
            ',

            'content_en' => '
                <iframe
                    src="https://datastudio.google.com/embed/reporting/d8f9f1ef-eb69-46b1-aac4-3d142277d168/page/W4sjC"
                    width="100%"
                    height="1800"
                    frameborder="0"
                ></iframe>
            ',

            'created_at' => now(),
            'updated_at' => now(),

        ]);

        // SEBARAN AHLI
        DB::table('publikasi')->insert([

            'category' => 'data',

            'status' => 'publish',

            'slug_id' => 'sebaran-ahli',
            'slug_en' => 'expert-distribution',

            'title_id' => 'Sebaran Ahli',
            'title_en' => 'Expert Distribution',

            'description_id' => '
                <p>
                    Database sebaran ahli dan jaringan pendukung isu SDA-LH.
                </p>
            ',

            'description_en' => '
                <p>
                    Expert distribution and support network database for natural resources and environmental issues.
                </p>
            ',

            'content_id' => '
                <div
                    style="
                        height:700px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #d1d5db;
                    "
                >
                    <p
                        style="
                            font-size:18px;
                            font-weight:600;
                            color:#6b7280;
                        "
                    >
                        Data Sebaran Ahli Belum Tersedia
                    </p>
                </div>
            ',

            'content_en' => '
                <div
                    style="
                        height:700px;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        border:1px solid #d1d5db;
                    "
                >
                    <p
                        style="
                            font-size:18px;
                            font-weight:600;
                            color:#6b7280;
                        "
                    >
                        Expert Distribution Data Not Available Yet
                    </p>
                </div>
            ',

            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
