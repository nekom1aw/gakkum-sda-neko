<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'category' => 'pencemaran',
                'title_id' => 'Pencemaran Air Sungai',
                'title_en' => 'River Water Pollution',
                'description_id' => '<p>Contoh data pencemaran yang menjelaskan temuan, dampak, dan sumber informasi.</p>',
                'description_en' => '<p>Sample pollution data describing findings, impacts, and information sources.</p>',
                'source_id' => 'https://example.com/pencemaran-air-sungai',
                'source_en' => 'https://example.com/en/river-water-pollution',
            ],
            [
                'category' => 'tata-ruang',
                'title_id' => 'Alih Fungsi Kawasan Lindung',
                'title_en' => 'Protected Area Conversion',
                'description_id' => '<p>Contoh data tata ruang mengenai perubahan fungsi kawasan dan potensi pelanggaran.</p>',
                'description_en' => '<p>Sample spatial planning data about land-use changes and potential violations.</p>',
                'source_id' => 'https://example.com/tata-ruang-kawasan-lindung',
                'source_en' => 'https://example.com/en/protected-area-conversion',
            ],
            [
                'category' => 'kelautan-dan-perikanan',
                'title_id' => 'Aktivitas Tambak di Pesisir',
                'title_en' => 'Coastal Aquaculture Activity',
                'description_id' => '<p>Contoh data kelautan dan perikanan terkait aktivitas pesisir dan dampaknya.</p>',
                'description_en' => '<p>Sample marine and fisheries data related to coastal activity and its impacts.</p>',
                'source_id' => 'https://example.com/aktivitas-tambak-pesisir',
                'source_en' => 'https://example.com/en/coastal-aquaculture-activity',
            ],
            [
                'category' => 'energi-dan-sumber-daya-mineral',
                'title_id' => 'Operasi Tambang Mineral',
                'title_en' => 'Mineral Mining Operation',
                'description_id' => '<p>Contoh data energi dan sumber daya mineral tentang operasi tambang dan pengawasannya.</p>',
                'description_en' => '<p>Sample energy and mineral resources data about mining operations and oversight.</p>',
                'source_id' => 'https://example.com/operasi-tambang-mineral',
                'source_en' => 'https://example.com/en/mineral-mining-operation',
            ],
            [
                'category' => 'perkebunan',
                'title_id' => 'Ekspansi Perkebunan Sawit',
                'title_en' => 'Palm Oil Plantation Expansion',
                'description_id' => '<p>Contoh data perkebunan tentang ekspansi lahan dan aspek kepatuhan lingkungan.</p>',
                'description_en' => '<p>Sample plantation data about land expansion and environmental compliance aspects.</p>',
                'source_id' => 'https://example.com/ekspansi-perkebunan-sawit',
                'source_en' => 'https://example.com/en/palm-oil-plantation-expansion',
            ],
            [
                'category' => 'hutan',
                'title_id' => 'Deforestasi Kawasan Hutan',
                'title_en' => 'Forest Area Deforestation',
                'description_id' => '<p>Contoh data hutan mengenai perubahan tutupan lahan dan indikasi deforestasi.</p>',
                'description_en' => '<p>Sample forest data about land-cover changes and deforestation indications.</p>',
                'source_id' => 'https://example.com/deforestasi-kawasan-hutan',
                'source_en' => 'https://example.com/en/forest-area-deforestation',
            ],
        ];

        foreach ($items as $item) {
            DB::table('sektor')->updateOrInsert(
                [
                    'category' => $item['category'],
                    'title_id' => $item['title_id'],
                ],
                [
                    'status' => 'publish',
                    'title_en' => $item['title_en'],
                    'description_id' => $item['description_id'],
                    'description_en' => $item['description_en'],
                    'source_id' => $item['source_id'],
                    'source_en' => $item['source_en'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
