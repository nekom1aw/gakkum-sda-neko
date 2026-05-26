<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();

            $table->enum('kategori', [
                'bincang-hukum',
                'aktivitas'
            ]);

            $table->string('jenis_kegiatan_id')->nullable();
            $table->string('jenis_kegiatan_en')->nullable();

            $table->string('image_id')->nullable();
            $table->string('image_en')->nullable();

            $table->date('tanggal')->nullable();

            $table->string('title_id')->nullable();
            $table->string('title_en')->nullable();

            $table->text('deskripsi_id')->nullable();
            $table->text('deskripsi_en')->nullable();

            $table->longText('content_id')->nullable();
            $table->longText('content_en')->nullable();

            $table->enum('status', [
                'draft',
                'publish'
            ])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};