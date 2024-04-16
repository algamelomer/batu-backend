<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUniversity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'video',
        'description_video',
        'description',
        'type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
