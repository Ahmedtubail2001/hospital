<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ambulances', function (Blueprint $table) {
            $table->id();
            $table->string('car_number');
            $table->string('car_model_en');
            $table->string('car_model_ar');
            $table->string('driver_license_number');
            $table->string('driver_phone');
            $table->boolean('is_available')->default(1);
            $table->integer('car_type')->default(1);
            $table->string('driver_name_en');
            $table->string('driver_name_ar');
            $table->string('notes_en')->nullable();
            $table->string('notes_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulances');
    }
};