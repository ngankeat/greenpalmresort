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
        Schema::create('f_a_qs_models', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id')->default(0);
            $table->string('name')->unique();
            $table->string('sound')->nullable();
            $table->text('description')->fullText();
            $table->tinyInteger('order')->nullable();
            $table->string('icon')->default('scan-search');
            $table->integer('num_views')->nullable()->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_a_qs_models');
    }
};
