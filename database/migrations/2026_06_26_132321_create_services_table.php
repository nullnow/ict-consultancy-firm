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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // Core Identity Fields
            $table->string('title');
            $table->string('slug')->unique()->index(); // Unique constraint allows features.service_slug to reference it safely

            // Copy / Content Fields
            $table->string('headline')->nullable();
            $table->string('strapline')->nullable(); // Maps to the subtitle/strapline form fields
            $table->text('message')->nullable();     // Maps to the structural positioning paragraph

            // Dynamic Solutions Matrix Array Schema: [{title, description}]
            $table->json('solutions')->nullable();

            // Display & Analytics Elements
            $table->string('results_summary')->nullable();
            $table->string('icon_class')->nullable();

            // Engagement & Conversions Triggers
            $table->string('call_to_action')->nullable();
            $table->string('closing_line')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
