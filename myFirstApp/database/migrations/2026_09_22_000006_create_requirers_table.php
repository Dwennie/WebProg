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
        Schema::create('requirers', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('category', 50)->default('hospital');
            $table->string('license_no')->nullable();
            $table->string('contact_person');
            $table->string('designation')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('province');
            $table->text('address')->nullable();
            $table->integer('total_requests')->default(0);
            $table->string('status', 50)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirers');
    }
};

