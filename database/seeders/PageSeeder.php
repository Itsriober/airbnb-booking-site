<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_name' => 'Home',
                'page_slug' => 'home',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'About Us',
                'page_slug' => 'about-us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Tours',
                'page_slug' => 'tours',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Contact Us',
                'page_slug' => 'contact-us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Terms and Conditions',
                'page_slug' => 'terms-and-conditions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        if (Page::count() == 0) {
            Page::insert($pages);
        }
    }
}
