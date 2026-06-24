<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTableAddFlexibility extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Modifying intro_text to be nullable to support flexible copy variations
            $table->text('intro_text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            // Reverting intro_text back to its original non-nullable state
            $table->text('intro_text')->nullable(false)->change();
        });
    }
}
