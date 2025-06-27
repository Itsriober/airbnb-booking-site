<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'paygate' => [
        'secret' => env('PAYGATE_SECRET', 'harmostays_secret_key'),
        'checkout_url' => env('PAYGATE_CHECKOUT_URL', 'https://checkout.harmostays.com/checkout'),
        'wallet_address' => env('PAYGATE_WALLET_ADDRESS', '0x6734be2F7C16de208483453DC64588C3c856ee0D'),
    ],

    'recaptcha' => [
        'key'     => '6LeUfggpAAAAABeD89fsp5C7b9SQe6aPo6Zx86FS',
        'secret' => '6LeUfggpAAAAAON5CvtdIt8wEzqLd_UOsa8hnE5o',
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],

];
