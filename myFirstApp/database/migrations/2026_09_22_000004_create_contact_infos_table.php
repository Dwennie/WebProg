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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('center_name');
            $table->string('facility_type', 50)->default('central_blood_bank');
            $table->string('coordinator');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('emergency_hotline');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('operating_hours')->default('24/7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};

