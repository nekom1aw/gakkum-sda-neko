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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();

            // category
            $table->enum('category', [
                'kiprah',
                'publikasi',
                'berita',
                'analisis',
                'data',
                'investigasi',
            ]);

             $table->enum('status', [
                'draft',
                'publish',
            ])->default('draft');

            // slug
            $table->string('slug_id');
            $table->string('slug_en');

            // image
            $table->text('image_id')->nullable();
            $table->text('image_en')->nullable();

            // title
            $table->string('title_id');
            $table->string('title_en');

            // description
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();

            // content
            $table->longText('content_id')->nullable();
            $table->longText('content_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi');
    }
};
