<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type'
    ];

    public function applications()
    {
        return $this->hasOne(JobApplication::class, 'jobs_id');
    }


}
