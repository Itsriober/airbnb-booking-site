<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'menu_id' => 1,
                'title' => 'Home',
                'slug' => 'home',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 1,
                'title' => 'About Us',
                'slug' => 'about-us',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 1,
                'title' => 'Tours',
                'slug' => 'tours',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 1,
                'title' => 'Blog',
                'slug' => 'blog',
                'menu_type' => 'custom',
                'target' => '/blogs',
                'parent_id' => NULL,
                'order' => 4,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 1,
                'title' => 'Contact',
                'slug' => 'contact-us',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'menu_id' => 2,
                'title' => 'About Us',
                'slug' => 'about-us',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 2,
                'title' => 'Tours',
                'slug' => 'tours',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'menu_id' => 2,
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'menu_id' => 2,
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'menu_type' => 'page',
                'target' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'new_tap' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        if (MenuItem::count() == 0) {
            MenuItem::insert($menus);
        }
    }
}
