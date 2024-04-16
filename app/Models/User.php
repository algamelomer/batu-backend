<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function post()
    {
        return $this->hasMany(post::class);
    }

    public function studyPlan()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }

    public function aboutUniversity()
    {
        return $this->hasMany(AboutUniversity::class);
    }
}
