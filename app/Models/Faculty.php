<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'logo',
        'video',
        'description_video',
        'description',
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

    public function supervisoryTeams()
    {
        return $this->hasMany(SupervisoryTeam::class);
    }

    public function facultyMember()
    {
        return $this->hasMany(FacultyMember::class);
    }

    public function studentProjects()
    {
        return $this->hasMany(StudentProjects::class);
    }
}
