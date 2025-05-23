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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchant_id');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('days')->nullable();
            $table->string('order_number');
            $table->string('product_id');
            $table->string('product_type');
            $table->string('transport_type')->nullable();
            $table->double('adult_unit_price')->default(0.00);
            $table->integer('adult_qty')->default(0);
            $table->double('adult_total_price')->default(0.00);
            $table->double('child_unit_price')->default(0.00);
            $table->integer('child_qty')->default(0);
            $table->double('child_total_price')->default(0.00);
            $table->longText('services')->nullable();
            $table->double('total_amount')->default(0.00);
            $table->double('tax_rate', 20,0)->default(0);
            $table->double('tax_amount', 20,2)->default(0.00);
            $table->double('total_with_tax', 20,2)->default(0.00);  
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('status')->default(1)->comment('Pending=1, Processing=2, Approved=3, Cancel=4');
            $table->integer('payment_status')->default(1)->comment('Paid = 1, Unpaid = 2');
            $table->bigInteger('view')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
