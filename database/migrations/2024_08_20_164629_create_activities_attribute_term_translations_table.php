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
        Schema::create('activities_attribute_term_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->string('name');
            $table->string('lang',50);
            $table->foreign('term_id')->references('id')->on('activities_attribute_terms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_attribute_term_translations');
    }
};
