<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'paypal' => [
        'client_id' => 'AbRpsoTMDNnMjhwfV3wTMWhz1EKNpW1sDduQaoCd8i8niZ1ICri4PX1qONYbMJtVA4mtnPdlN6FpDRAJ',
        'secret' => 'EP_3RS7Xy_kTMLAVmrXiGFd4sfzLj6ZJ-jG_yMaT7msBQT5NIDRV0Oa_IaxPXHdJMaX3B1uUSde4DbaG'
    ],

];
