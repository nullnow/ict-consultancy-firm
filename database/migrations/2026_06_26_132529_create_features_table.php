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
        Schema::create('features', function (Blueprint $table) {
            $table->id();

            // Set service_slug as the foreign key referencing services.slug
            $table->string('service_slug')->nullable();

            $table->foreign('service_slug')
                ->references('slug')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // Automatically updates if the service slug changes

            $table->string('title')->nullable();
            $table->json('content')->nullable();
            $table->string('icon_class')->nullable();
            $table->integer('sort_order')->nullable();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
