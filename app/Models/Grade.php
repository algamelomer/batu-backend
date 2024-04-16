<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'score', 'grade_student_id'];

    public function student()
        {
            return $this->belongsTo(GradeStudent::class);
        }
}
