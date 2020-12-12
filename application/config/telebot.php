<?php


return [
  // Add you bot's API key and name
  'api_key' => 'xxxxx:xxxxxx',
  'bot_username' => 'xxxxx', // Without "@"

  // [Manager Only] Secret key required to access the webhook
  'secret' => 'xxxxxxx',



  // All command related configs go here
  'commands' => [
    // Define all paths for your custom commands
    'paths' => [
      APPPATH  . 'controllers/Commands',
    ],
    // Here you can set any command-specific parameters
    'configs' => [
      // - Google geocode/timezone API key for /date command (see DateCommand.php)
      // 'date'    => ['google_api_key' => 'your_google_api_key_here'],
      // - OpenWeatherMap.org API key for /weather command (see WeatherCommand.php)
      // 'weather' => ['owm_api_key' => 'your_owm_api_key_here'],
      // - Payment Provider Token for /payment command (see Payments/PaymentCommand.php)
      // 'payment' => ['payment_provider_token' => 'your_payment_provider_token_here'],

    ],
  ],

  // Define all IDs of admin users
  'admins' => [
    958587442,
  ],

  'mysql' => [
    'host' => 'localhost',
    'port' => 3306, // optional
    'user' => 'xxxxx',
    'password' => 'xxxxx',
    'database' => 'xxxxx',
  ],

  // Logging (Debug, Error and Raw Updates)
  'logging' => [
    'debug' => __DIR__ . '/php-telegram-bot-debug.log',
    'error' => __DIR__ . '/php-telegram-bot-error.log',
    'update' => __DIR__ . '/php-telegram-bot-update.log',
  ],

  // Set custom Upload and Download paths
  'paths' => [
    'download' => APPPATH . '/telegram/download',
    'upload' => APPPATH . '/telegram/upload',
  ],

  // Requests Limiter (tries to prevent reaching Telegram API limits)
  'limiter' => [
    'enabled' => true,
  ],
];
