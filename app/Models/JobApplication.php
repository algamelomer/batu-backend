<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id',
        'phone',
        'email',
        'cv',
        'jobs_id'
    ];


    public function job()
    {
        return $this->belongsTo(Job::class, 'jobs_id');
    }
}
