<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('use_cases', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('service_id')
                      ->constrained()
                      ->cascadeOnDelete();

            // Maps to the "Use case" heading from the document layout
            $blueprint->string('title');

            // Maps to the "Example" heading from the document layout
            $blueprint->text('example');

            // Maintains UI rendering arrays sequence
            $blueprint->integer('sort_order')->default(0)->index();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use_cases');
    }
};
