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
        Schema::create('sektor', function (Blueprint $table) {
            $table->id();

            $table->enum('category', [
                'pencemaran',
                'tata-ruang',
                'kelautan-dan-perikanan',
                'energi-dan-sumber-daya-mineral',
                'perkebunan',
                'hutan',
            ]);

            $table->enum('status', [
                'draft',
                'publish',
            ])->default('draft');

            $table->string('title_id');
            $table->string('title_en');

            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();

            $table->text('source_id')->nullable();
            $table->text('source_en')->nullable();

            $table->timestamps();

            $table->index('category');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sektor');
    }
};
