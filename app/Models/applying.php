<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applying extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'user_id',
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }
}
