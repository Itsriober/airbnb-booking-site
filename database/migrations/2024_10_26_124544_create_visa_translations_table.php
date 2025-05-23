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
        Schema::create('visa_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visa_id');
            $table->string('title');
            $table->string('lang',50);
            $table->foreign('visa_id')->references('id')->on('visas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_translations');
    }
};
