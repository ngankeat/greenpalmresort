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
        Schema::create('roomType', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('amenities_id');
            $table->unsignedBigInteger('facilities_id');
            $table->string('description_short')->nullable();
            $table->string('description_long')->nullable();
            $table->string('room_name')->nullable();
            $table->string('price')->nullable();
            $table->string('promotion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roomType');
    }
};
