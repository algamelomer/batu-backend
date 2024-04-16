<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'description_video',
        'logo',
        'image',
        'video',
        'faculty_id',
        'user_id',
        'job_opportunities',
        'mission',
        'vision'
    ];

    protected $casts = [
        'job_opportunities' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function studentProjects()
    {
        return $this->hasMany(StudentProjects::class);
    }

    public function gradeStudent()
    {
        return $this->hasMany(StudentProjects::class);
    }

    public function studyPlan()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function facultyMember()
    {
        return $this->hasMany(FacultyMember::class);
    }

    public function supervisoryTeam()
    {
        return $this->hasMany(SupervisoryTeam::class);
    }
}
