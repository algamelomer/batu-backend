<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresidentAlerts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
    ];
}
