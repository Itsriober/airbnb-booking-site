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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyward')->nullable();
            $table->string('meta_img')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('shoulder');
            $table->longText('content')->nullable();
            $table->text('youtube_image')->nullable();
            $table->text('youtube_video')->nullable();
            $table->string('faq_title')->nullable();
            $table->longText('faqs')->nullable();
            $table->integer('days')->nullable();
            $table->integer('nights')->nullable();
            $table->integer('min_advance_reservations')->nullable()->comment('day');
            $table->integer('min_stay')->nullable()->comment('day');
            $table->double('price',20,2)->default(0.00);
            $table->double('sale_price',20,2)->default(0.00);
            $table->double('child_price',20,2)->default(0.00);
            $table->integer('max_people')->nullable();
            $table->integer('enable_service_fee')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('service_fees')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->string('include_title')->nullable();
            $table->longText('includes')->nullable();
            $table->string('exclude_title')->nullable();
            $table->longText('excludes')->nullable();
            $table->string('highlight_title')->nullable();
            $table->longText('highlights')->nullable();
            $table->string('plan_title')->nullable();
            $table->longText('activities_plan')->nullable();
            $table->longText('attribute_terms')->nullable();
            $table->text('feature_img')->nullable();
            $table->string('enable_seo')->nullable();
            $table->integer('status')->default(1)->comment('Active=1, Draft=2, Inactive=3');
            $table->bigInteger('view')->default(0);
            $table->foreign('country_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
