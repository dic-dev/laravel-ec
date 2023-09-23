<?php
return [
    'stripe_public_key' => env('STRIPE_KEY'),
    'stripe_secret_key' => env('STRIPE_SECRET'),
    'stripe_webhook' => env('STRIPE_WEBHOOK'),
    'stripe_webhook_tolerance' => env('STRIPE_WEBHOOK_TOLERANCE'),
];
