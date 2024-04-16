<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'file',
        'team_name',
        'department_id',
        'faculty_id'
        ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
