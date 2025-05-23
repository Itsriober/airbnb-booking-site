<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $settings = [
            [
                'type' => 'email_address',
                'value' => 'info@auctionlab.com',
            ],
            [
                'type' => 'hotline_text',
                'value' => 'Click To Call',
            ],
            [
                'type' => 'hotline_phone',
                'value' => '+347-274-8816',
            ],
            [
                'type' => 'company_address',
                'value' => '168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka',
            ],
            [
                'type' => 'company_phone1',
                'value' => '+0213549826649',
            ],
            [
                'type' => 'company_phone2',
                'value' => '+8801761111456',
            ],
            [
                'type' => 'company_email1',
                'value' => 'support@example.com',
            ],
            [
                'type' => 'company_email2',
                'value' => 'info@example.com',
            ],
            [
                'type' => 'company_location_map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6473915.87138904!2d-95.665!3d37.6!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1694071086254!5m2!1sen!2sbd"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],

            [
                'type' => 'default_currency',
                'value' => 1,
            ],
            [
                'type' => 'facebook_link',
                'value' => 'https://www.facebook.com',
            ],
            [
                'type' => 'twitter_link',
                'value' => 'https://twitter.com',
            ],
            [
                'type' => 'linkedin_link',
                'value' => 'https://www.linkedin.com',
            ],
            [
                'type' => 'youtube_link',
                'value' => 'https://www.youtube.com',
            ],
            [
                'type' => 'instagram_link',
                'value' => 'https://www.instagram.com',
            ],
            [
                'type' => 'pinterest_link',
                'value' => 'https://www.pinterest.com',
            ],
            [
                'type' => 'front_copyright_en',
                'value' => 'Copyright 2025 <a href="https://www.triprex-app.egenslab.com/" target="_blank">TripRex </a>| Design By <a href="https://www.egenslab.com/" target="_blank">Egens Lab</a>',
            ],
            [
                'type' => 'front_copyright_bd',
                'value' => 'Copyright 2025 <a href="https://www.triprex-app.egenslab.com/" target="_blank">TripRex </a>| Design By <a href="https://www.egenslab.com/" target="_blank">Egens Lab</a>',
            ],
            [
                'type' => 'front_copyright_sa',
                'value' => 'Copyright 2025 <a href="https://www.triprex-app.egenslab.com/" target="_blank">TripRex </a>| Design By <a href="https://www.egenslab.com/" target="_blank">Egens Lab</a>',
            ],

            [
                'key' => 'breadcamp_img',
                'value' => 'inner-banner-bg-1731481033.png',
            ],
            [
                'key' => 'tax_rate',
                'value' => 5,
            ],
            [
                'key' => 'footer_logo',
                'value' => 'logo2-1722663478.svg',
            ],
            [
                'key' => 'payment_method_img',
                'value' => 'payment-logo.png',
            ],

            [
                'key' => 'footer_marketing_title',
                'value' => 'Want to take tour packages?',
            ],

            [
                'key' => 'footer_marketing_btn_link',
                'value' => '/tours',
            ],


            [
                'key' => 'footer_desc_en',
                'value' => 'Triprex is an application about various types of Tour and Travels. This theme can be used for different types of purposes.',
            ],
            [
                'key' => 'footer_desc_sa',
                'value' => 'Triprex is an application about various types of Tour and Travels. This theme can be used for different types of purposes.',
            ],
            [
                'key' => 'footer_desc_bd',
                'value' => 'Triprex is an application about various types of Tour and Travels. This theme can be used for different types of purposes.',
            ],
            [
                'key' => 'time_zone',
                'value' => 'Asia/Dhaka',
            ],
            [
                'key' => 'footer1_status',
                'value' => 1,
            ],
            [
                'key' => 'footer_phone',
                'value' => '+347-274-8816',
            ],
            [
                'key' => 'footer_email',
                'value' => 'info@triprex.com',
            ],

            [
                'key' => 'footer_address',
                'value' => 'Block A, House 82 Rd No 2',
            ],
            [
                'key' => 'footer1_title',
                'value' => 'Navigation',
            ],
            [
                'key' => 'footer2_status',
                'value' => 1,
            ],
            [
                'key' => 'footer2_title',
                'value' => 'Help & Support',
            ],
            [
                'key' => 'footer3_status',
                'value' => 1,
            ],
            [
                'key' => 'footer_latest_title',
                'value' => 'Latest Feed',
            ],
            [
                'key' => 'footer4_status',
                'value' => 1,
            ],
            [
                'key' => 'hide_footer_bottom',
                'value' => 2,
            ],
            [
                'key' => 'company_name',
                'value' => env('APP_NAME'),
            ],
            [
                'key' => 'login_btn',
                'value' => 'Login',
            ],
            [
                'key' => 'customer_btn',
                'value' => 'Sign Up',
            ],
            [
                'key' => 'marchant_btn',
                'value' => 'Become a Agent',
            ],
            [
                'key' => 'merchant_commission',
                'value' => 5,
            ],
            [
                'key' => 'date_format',
                'value' => 'M j, Y',
            ],
            [
                'key' => 'show_preloader',
                'value' => 1,
            ],
            [
                'key' => 'primary_color',
                'value' => '#63AB45',
            ],
            [
                'key' => 'secondary_color',
                'value' => '#FBB03B',
            ],
            [
                'key' => 'gdpr_cookie_enabled',
                'value' => 2,
            ],
            [
                'key' => 'gdpr_title_en',
                'value' => 'Decadent Delights: Explore the Artistry of TripRex',
            ],
            [
                'key' => 'gdpr_description_en',
                'value' => '<p>Step into a world where every bite is a blissful journey of flavor and texture. At Bid Out, our cookies are more than just sweet treats â€“ they'.'re handcrafted masterpieces. From classic chocolate chip to exotic flavor fusions, our collection invites you to savor the artistry of premium ingredients and passion-infused baking.Â <br></p>',
            ],
            [
                'key' => 'gdpr_title_sa',
                'value' => 'Decadent Delights: Explore the Artistry of TripRex',
            ],
            [
                'key' => 'gdpr_description_sa',
                'value' => '<p>Step into a world where every bite is a blissful journey of flavor and texture. At Bid Out, our cookies are more than just sweet treats â€“ they'.'re handcrafted masterpieces. From classic chocolate chip to exotic flavor fusions, our collection invites you to savor the artistry of premium ingredients and passion-infused baking.Â <br></p>',
            ],
            [
                'key' => 'gdpr_title_bd',
                'value' => 'Decadent Delights: Explore the Artistry of TripRex',
            ],
            [
                'key' => 'gdpr_description_bd',
                'value' => '<p>Step into a world where every bite is a blissful journey of flavor and texture. At Bid Out, our cookies are more than just sweet treats â€“ they'.'re handcrafted masterpieces. From classic chocolate chip to exotic flavor fusions, our collection invites you to savor the artistry of premium ingredients and passion-infused baking.Â <br></p>',
            ],
            [
                'key' => 'mail_driver',
                'value' => null,
            ],
            [
                'key' => 'mail_host',
                'value' => null
            ],
            [
                'key' => 'mail_port',
                'value' => '587',
            ],
            [
                'key' => 'mail_from_address',
                'value' => null,
            ],
            [
                'key' => 'mail_from_name',
                'value' => env('APP_NAME'),
            ],
            [
                'key' => 'mail_encryption',
                'value' => 'tls',
            ],
            [
                'key' => 'mail_username',
                'value' => null,
            ],
            [
                'key' => 'mail_password',
                'value' => null,
            ],
            [
                'key' => 'DEFAULT_LANGUAGE',
                'value' => 'en',
            ],
            [
                'key' => 'header_logo',
                'value' => 'logo-1735801496.svg',
            ],

        ];

        if (Setting::count() == 0) {
            Setting::insert($settings);
        }

    }
}
