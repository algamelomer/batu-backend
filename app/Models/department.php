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
        'logo',
        'image',
        'video',
        'description_video',
        'mission',
        'vision',
        'faculty_id',
        'user_id',
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

    public function jobOpportunities()
    {
        return $this->hasMany(JobOpportunities::class);
    }

    public function gradeStudent()
    {
        return $this->hasMany(GradeStudent::class);
    }

    public function studyPlan()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function staffPrograms()
    {
        return $this->hasMany(StaffPrograms::class);
    }

    public function staffMembers()
    {
        return $this->hasMany(StaffMembers::class);
    }

}
