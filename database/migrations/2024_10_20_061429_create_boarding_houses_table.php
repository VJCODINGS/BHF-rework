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
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('maplink')->nullable();
            $table->string('description')->nullable();
            $table->string('policies')->nullable();
            $table->time('curfew')->nullable();
            $table->enum('gender', ['male only', 'female only', 'male and female']);
            $table->string('profile_picture')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_houses');
    }
};
