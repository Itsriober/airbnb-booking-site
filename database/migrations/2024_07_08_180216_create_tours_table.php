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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyward')->nullable();
            $table->string('meta_img')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('shoulder')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('youtube_image')->nullable();
            $table->text('youtube_video')->nullable();
            $table->string('min_people')->nullable();
            $table->string('max_people')->nullable();
            $table->integer('min_advance_reservations')->nullable()->comment('day');
            $table->integer('cancellation')->nullable()->comment('hour');
            $table->string('faq_title')->nullable();
            $table->longText('faqs')->nullable();
            $table->string('include_title')->nullable();
            $table->longText('includes')->nullable();
            $table->string('exclude_title')->nullable();
            $table->longText('excludes')->nullable();
            $table->string('highlights')->nullable();
            $table->longText('highlight_title')->nullable();
            $table->string('itinerary_title')->nullable();
            $table->longText('itinerary')->nullable();
            $table->double('price', 20, 2)->default(0.00);
            $table->double('sale_price', 20, 2)->default(0.00);
            $table->double('child_price', 20, 2)->default(0.00);
            $table->integer('enable_person_types')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('person_types')->nullable();
            $table->integer('enable_extra_price')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('extra_prices')->nullable();
            $table->integer('enable_service_fee')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('service_fees')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->text('sub_destination')->nullable();
            $table->integer('enable_fixed_dates')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('fixed_dates')->nullable();
            $table->integer('enable_open_hours')->default(2)->comment('Enable=1, Disable=2');
            $table->longText('open_hours')->nullable();
            $table->longText('attribute_terms')->nullable();
            $table->text('features_image')->nullable();
            $table->string('enable_seo')->nullable();
            $table->integer('status')->default(1)->comment('Active=1, Draft=2, Inactive=3');
            $table->bigInteger('view')->default(0);
            $table->integer('is_featured')->default(2);
            $table->foreign('category_id')->references('id')->on('tour_categories')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
