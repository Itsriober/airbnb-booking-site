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
        Schema::create('activities_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activities_id');
            $table->string('title');
            $table->string('shoulder')->nullable();
            $table->longText('content')->nullable();
            $table->string('lang',50);
            $table->foreign('activities_id')->references('id')->on('activities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_translations');
    }
};
