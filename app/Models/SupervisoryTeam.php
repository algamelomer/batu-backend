<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisoryTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'position',
        'faculty_id',
        'department_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
