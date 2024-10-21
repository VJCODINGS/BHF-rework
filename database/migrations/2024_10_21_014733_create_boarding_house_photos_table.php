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
        Schema::create('boarding_house_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boarding_house_id')->constrained()->onDelete('cascade');
            $table->string('photo_path'); // Store photo paths here
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_house_photos');
    }
};
