<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'file_type',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
