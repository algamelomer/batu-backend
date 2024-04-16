<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStudent extends Model
{
    use HasFactory;

    protected $fillable = ['sitting_num', 'name', 'department_id', 'academic_year'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
