<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityLeaders extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'word',
        'email',
        'position',
        'cv',
        'user_id',
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }

    public function  staffSocial()
    {
        return  $this->hasMany(staffSocial::class);
    }

}
