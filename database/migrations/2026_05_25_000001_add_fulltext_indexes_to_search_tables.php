<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about', function (Blueprint $table) {
            $table->fullText([
                'title_id',
                'title_en',
                'deskripsi_id',
                'deskripsi_en',
                'content_id',
                'content_en',
            ], 'about_search_fulltext');
        });

        Schema::table('agenda', function (Blueprint $table) {
            $table->fullText([
                'title_id',
                'title_en',
                'description_id',
                'description_en',
                'content_id',
                'content_en',
                'jenis_kegiatan',
            ], 'agenda_search_fulltext');
        });

        Schema::table('publikasi', function (Blueprint $table) {
            $table->fullText([
                'title_id',
                'title_en',
                'description_id',
                'description_en',
                'content_id',
                'content_en',
            ], 'publikasi_search_fulltext');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->fullText([
                'title_id',
                'title_en',
                'deskripsi_id',
                'deskripsi_en',
                'content_id',
                'content_en',
                'jenis_kegiatan_id',
                'jenis_kegiatan_en',
            ], 'kegiatan_search_fulltext');
        });

        Schema::table('sektor', function (Blueprint $table) {
            $table->fullText([
                'title_id',
                'title_en',
                'description_id',
                'description_en',
                'source_id',
                'source_en',
            ], 'sektor_search_fulltext');
        });
    }

    public function down(): void
    {
        Schema::table('about', function (Blueprint $table) {
            $table->dropFullText('about_search_fulltext');
        });

        Schema::table('agenda', function (Blueprint $table) {
            $table->dropFullText('agenda_search_fulltext');
        });

        Schema::table('publikasi', function (Blueprint $table) {
            $table->dropFullText('publikasi_search_fulltext');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropFullText('kegiatan_search_fulltext');
        });

        Schema::table('sektor', function (Blueprint $table) {
            $table->dropFullText('sektor_search_fulltext');
        });
    }
};
