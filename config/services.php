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

    'qq' => [
    'client_id' => env('101445016'),
    'client_secret' => env('ebd13d7be7a43deea19ddcbcefe959d2'),
    'redirect' => env('http://www.shops.com/qqCallback'),
    ],


    'weibo' => [
        'client_id' => env('901265935'),
        'client_secret' => env('657fc40e23af670c10b59a7a9ebab11a '),
        'redirect' => env('http://www.shops.com/wbCallback'),
    ],

];
