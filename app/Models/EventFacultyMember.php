<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFacultyMember extends Model
{
    use HasFactory;
    protected $fillable =[
        'event_id',
        'faculty_member_id'
    ];
}
