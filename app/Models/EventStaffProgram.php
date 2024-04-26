<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventStaffProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_program_id',
        'event_id'
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function staffPrograms()
    {
        return $this->belongsToMany(StaffPrograms::class);
    }
}
