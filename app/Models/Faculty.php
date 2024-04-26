<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'logo',
        'video',
        'description_video',
        'vision',
        'mission',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function facultyLeaders()
    {
        return $this->hasMany(FacultyLeaders::class);
    }

    public function applyStudies()
    {
        return $this->hasMany(ApplyStudies::class);
    }

    public function staffMembers()
    {
        return $this->hasMany(StaffMembers::class);
    }

    public function  facultyAgentStaff()
    {
        return  $this->hasMany(FacultyAgentStaff::class);
    }
}
