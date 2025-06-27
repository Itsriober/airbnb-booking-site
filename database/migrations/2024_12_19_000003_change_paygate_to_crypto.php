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
        // Update existing paygate to crypto
        DB::table('payment_methods')
            ->where('method_name', 'paygate')
            ->update([
                'method_name' => 'crypto',
                'default_logo' => 'crypto.png',
                'updated_at' => now(),
            ]);

        // If no paygate exists, create crypto
        $existingCrypto = DB::table('payment_methods')
            ->where('method_name', 'crypto')
            ->first();

        if (!$existingCrypto) {
            DB::table('payment_methods')->insert([
                'method_name' => 'crypto',
                'default_logo' => 'crypto.png',
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
        // Change crypto back to paygate
        DB::table('payment_methods')
            ->where('method_name', 'crypto')
            ->update([
                'method_name' => 'paygate',
                'default_logo' => 'paygate.png',
                'updated_at' => now(),
            ]);
    }
};
