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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_code');
            $table->string('discount_percentage');
            $table->string('Company_rate');
            $table->boolean('status');
            $table->string('name_en');
            $table->string('name_ar');
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
        Schema::dropIfExists('insurance');
    }
};