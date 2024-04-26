<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPrograms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'word',
        'email',
        'position',
        'cv',
        'department_id',
        'user_id',
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function department()
    {
        return  $this->belongsTo(Department::class, 'department_id');
    }

    public function eventStaffProgram()
    {
        return $this->hasMany(EventStaffProgram::class);
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

