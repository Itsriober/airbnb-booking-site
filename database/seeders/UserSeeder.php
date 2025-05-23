<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = [
            [
                'custom_id' => null,
                'fname' => 'TripRex',
                'lname' => 'Ltd',
                'username' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'role' => 4,
                'remember_token' => Str::random(10),
                'image' => 'eg-logo-1702294552.png',
                'phone' => '017902240245',
                'address' => 'House#168/170, Road 02, Avenue 01, Mirpur DOHS',
                'country_id' => 1,
                'state_id' => 2,
                'city_id' => 3,
                'zip_code' => '1216',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'custom_id' => 'MC0001',
                'fname' => 'Robert',
                'lname' => 'James',
                'username' => 'Merchant',
                'email' => 'merchant@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'role' => 2,
                'remember_token' => Str::random(10),
                'image' => 'T1 (1)-1740652401.png',
                'phone' => '017902240265',
                'address' => 'House#168/170, Road 02, Avenue 01, Mirpur DOHS',
                'country_id' => 1,
                'state_id' => 2,
                'city_id' => 3,
                'zip_code' => '1216',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'custom_id' => 'C0001',
                'fname' => 'Robert',
                'lname' => 'James',
                'username' => 'Cutomer',
                'email' => 'customer@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'role' => 1,
                'remember_token' => Str::random(10),
                'image' => 'Team 01-1740653471.png',
                'phone' => '017902240275',
                'address' => 'House#168/170, Road 02, Avenue 01, Mirpur DOHS',
                'country_id' => 1,
                'state_id' => 2,
                'city_id' => 3,
                'zip_code' => '1216',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        if (User::count() == 0) {
            User::insert($users);
        }

    }
}
