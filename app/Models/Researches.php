<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researches extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'staff_programs_id',
        'staff_members_id'
    ];

    public function  user()
    {
        return  $this->belongsTo(User::class);
    }

    public function staffPrograms()
    {
        return   $this->belongsTo(StaffPrograms::class);
    }

    public function staffMembers()
    {
        return   $this->belongsTo(StaffMembers::class);
    }
}
