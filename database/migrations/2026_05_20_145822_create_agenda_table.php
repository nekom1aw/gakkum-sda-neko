<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {

            $table->id();

            // status
            $table->enum('status', [
                'draft',
                'publish',
            ])->default('draft');

            // jenis kegiatan
            $table->string('jenis_kegiatan')->nullable();

            // indonesia
            $table->string('slug_id')->nullable();
            $table->string('title_id')->nullable();
            $table->text('description_id')->nullable();
            $table->longText('content_id')->nullable();

            // english
            $table->string('slug_en')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->longText('content_en')->nullable();

            // tanggal kegiatan
            $table->date('date')->nullable();

            // image
            $table->text('image_id')->nullable();
            $table->text('image_en')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};