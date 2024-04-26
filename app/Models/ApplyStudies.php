<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyStudies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'graduate',
        'user_id',
        'faculty_id',
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }

    public function  faculty()
    {
        return  $this->belongsTo(Faculty::class);
    }
}
