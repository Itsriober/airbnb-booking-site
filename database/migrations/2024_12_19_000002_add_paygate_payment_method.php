<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if PayGate payment method already exists
        $existingPaygate = DB::table('payment_methods')
            ->where('method_name', 'paygate')
            ->first();

        if (!$existingPaygate) {
            DB::table('payment_methods')->insert([
                'method_name' => 'paygate',
                'default_logo' => 'paygate.png',
                'logo' => null,
                'mode' => 'live',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('payment_methods')
            ->where('method_name', 'paygate')
            ->delete();
    }
};
