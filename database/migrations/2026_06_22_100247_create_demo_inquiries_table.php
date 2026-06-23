<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('demo_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('fleet_size')->nullable();
            $table->string('service_interested_in');
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending, contacted, closed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_inquiries');
    }
}
