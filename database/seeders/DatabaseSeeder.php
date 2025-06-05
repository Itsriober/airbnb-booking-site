<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PageSeeder::class,
            MenuSeeder::class,
            MenuItemSeeder::class,
            CurrenceSeeder::class,
            EmailTemplateSeeder::class,
            LanguageSeeder::class,
            WidgetSeeder::class,
            SettingSeeder::class,
            ShopSeeder::class,
            PaymentMethodSeeder::class,
            LocationSeeder::class,
        ]);

    }
}
