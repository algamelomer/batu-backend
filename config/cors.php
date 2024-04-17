<?php

// config/cors.php

// config/cors.php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    'allowed_origins' => [
        'http://localhost:5173', // Development frontend URL
        'http://127.0.0.1:5173', // Development frontend URL
        'https://127.0.0.1:5173', // Development frontend URL
        'https://batechu.com',   // Production frontend URL

        'http://127.0.0.1:8000', // Development backend URL
        'https://127.0.0.1:8000', // Development backend URL
        'https://admin.batechu.com/', // production backend URL

        


    ],
    'allowed_headers' => ['*'],
    'allowed_origins_patterns' => [],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
