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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'sp_api' => [
        'client_id' => env('SP_API_CLIENT_ID'),
        'client_secret' => env('SP_API_CLIENT_SECRET'),
        'refresh_token' => env('SP_API_REFRESH_TOKEN'),
        'endpoint' => env('SP_API_ENDPOINT'),
        'access_key_id' => env('SP_API_ACCESS_KEY_ID'),
        'secret_access_key' => env('SP_API_SECRET_ACCESS_KEY'),
        'region' => env('SP_API_REGION'),
        'role_arn' => env('SP_API_ROLE_ARN'),
    ],

];
