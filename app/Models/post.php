<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postFiles()
    {
        return $this->hasMany(PostFile::class, 'post_id');
    }
}
