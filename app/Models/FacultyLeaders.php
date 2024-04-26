<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyLeaders extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'word',
        'email',
        'category',
        'cv',
        'position',
        'user_id',
        'faculty_id',
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }

    public  function faculty()
    {
        return  $this->belongsTo(Faculty::class);
    }

    public function  staffSocial()
    {
        return  $this->hasMany(staffSocial::class);
    }
}
