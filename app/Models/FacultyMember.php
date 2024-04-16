<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'user_id',
        'faculty_id',
        'name',
        'image',
        'title',
        'sub_title',
        'career',
        'experience',
        'scientific_interests',
        'word',
        'certificates_title',
        'certificates_description',
        'head_description',
        'cv',
        'Researches',
        'Researches_title',
        'Researches_description',
        'email',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class, 'lecturer_id');
    }
}
