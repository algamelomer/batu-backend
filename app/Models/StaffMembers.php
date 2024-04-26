<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'email',
        'position',
        'cv',
        'department_id',
        'faculty_id',
        'user_id',
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }

    public function  faculty()
    {
        return  $this->belongsTo(Faculty::class);
    }

    public function  department()
    {
        return  $this->belongsTo(Department::class, 'department_id');
    }

    public function  certificates()
    {
        return  $this->hasMany(Certificates::class);
    }

    public function  researches()
    {
        return  $this->hasMany(Researches::class);
    }

    public function studyPlan()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function  staffSocial()
    {
        return  $this->hasMany(staffSocial::class);
    }
}
