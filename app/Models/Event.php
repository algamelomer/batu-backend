<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'user_id'
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->hasMany(EventMedia::class);
    }

    public function eventStaffProgram()
    {
        return $this->hasMany(EventStaffProgram::class);
    }
}
