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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('type');
            $table->string('product_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('image')->nullable();
            $table->longText('message');
            $table->string('visa_type')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->integer('status')->default(1)->comment('Received=1, Feedback=2');
            $table->foreign('country_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
