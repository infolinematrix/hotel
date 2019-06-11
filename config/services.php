<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
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
        //'model' => Reactor\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),         // Your GitHub Client ID
        'client_secret' => env('GITHUB_CLIENT_SECRET'), // Your GitHub Client Secret
        'redirect' => 'http://your-callback-url',
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_CALLBACK_URL'),
    ],

    'google' => [
        'client_id' => "226139349610-u678s8uroc070mm1s8k54id8roqnhbgr.apps.googleusercontent.com",
        'client_secret' => "w2xUCH4wkRdQ6LDYtvcj8tYC",
        'redirect' => 'http://45.33.57.159/oauth/google/callback',
    ],


    'paypal' => [
        'username' => env('PAYPAL_USERNAME','infolinematrix_api1.gmail.com'),
        'password' => env('PAYPAL_PASSWORD','8Q69YJTK8YKM5ZWC'),
        'signature' => env('PAYPAL_SIGNATURE','AqjIi6NJHYUEIqhfpgg8pMMiX1G-AIn3z.8wRan1RASAlDlDMtfbbRNy'),
        'sandbox' => env('PAYPAL_SANDBOX','true'),
    ],
];
