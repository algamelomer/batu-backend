<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaderCouncil extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'position',
        'description',
        'user_id',
    ];

    public function  user() {
        return  $this->belongsTo(User::class);
    }

    public function  staffSocial() {
        return  $this->hasMany(StaffSocial::class);
    }
}
