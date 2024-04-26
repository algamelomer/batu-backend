<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyAgentStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'word',
        'email',
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

    public  function staffSocial()
    {
        return  $this->hasMany(StaffSocial::class);
    }
}
