<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_publikasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('publikasi_id')
                ->constrained('publikasi')
                ->cascadeOnDelete();

            /*
            type:
            - source
            - download
            - attachment
            */
            $table->enum('type', [
                'source',
                'download',
                'attachment'
            ]);

            // link
            $table->text('source_id')->nullable();
            $table->text('source_en')->nullable();

            // pdf/file
            $table->text('file_id')->nullable();
            $table->text('file_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_publikasi');
    }
};
