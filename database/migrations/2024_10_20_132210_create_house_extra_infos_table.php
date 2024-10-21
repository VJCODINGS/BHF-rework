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
        Schema::create('house_extra_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boarding_house_id')->constrained()->onDelete('cascade'); // Connect to boarding_houses
            $table->integer('number_of_CR')->default(0);
            $table->boolean('wifi')->default(false);
            $table->boolean('secure_entry_system')->default(false);
            $table->boolean('kitchen_use')->default(false);
            $table->boolean('laundry_facilities')->default(false);
            $table->boolean('storage_spaces')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('parking_area')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->boolean('study_area')->default(false);
            $table->boolean('recreational_facilities')->default(false);
            $table->boolean('backyard_or_garden_access')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_extra_infos');
    }
};
