<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applyingStudy extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'faculty',
        'category',
    ];
}
