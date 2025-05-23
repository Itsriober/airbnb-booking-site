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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('maximum_stay')->nullable();
            $table->string('processing')->nullable();
            $table->string('validity')->nullable();
            $table->string('visa_mode')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->text('banner_img')->nullable();
            $table->longText('faqs')->nullable();
            $table->longText('includes')->nullable();
            $table->double('cost',20,2)->default(0.00);
            $table->text('features_image')->nullable();
            $table->string('enable_seo')->nullable();
            $table->integer('status')->default(1)->comment('Active=1, Draft=2, Inactive=3');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('visa_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
