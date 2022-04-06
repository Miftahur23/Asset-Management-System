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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' =>'520177949683604' ,
        'client_secret' => 'fe5bcbadb23bb4813651620d191cb760',
        'redirect' =>'https://asset.test/auth/facebook/callback' ,
    ],

    'google' => [
        'client_id' =>'1010857364057-j0f08hhto1a94dr3um0v2n19dnktil06.apps.googleusercontent.com' ,
        'client_secret' => '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',
        'redirect' =>'https://asset.test/auth/google/callback' ,
    ],

    'github' => [
        'client_id' => 'f80ec157138602015e11',
        'client_secret' => '08dbbbebe4b29d46d05a22af986cba7bbabbcf13',
        'redirect' => 'https://asset.test/auth/github/callback'
    ],

    'linkedin' => [
        'client_id' => '86loqpino9yfrx',
        'client_secret' => 'esLDz6Lwkk10csUW',
        'redirect' => 'https://asset.test/auth/linkedin/callback'
    ],

];
