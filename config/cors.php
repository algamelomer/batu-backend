<?php

// config/cors.php

// config/cors.php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    'allowed_origins' => [
        'http://localhost:5173', // Development frontend URL
        'https://batechu.com'    // Production frontend URL
    ],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
