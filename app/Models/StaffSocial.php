<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'image',
        'university_leaders_id',
        'faculty_leaders_id',
        'staff_members_id',
        'staff_programs_id',
        'faculty_agent_staff_id',
        'leader_council_id',
        'user_id',
    ];
    public function universityLeaders()
    {
        return  $this->belongsTo(UniversityLeaders::class, "university_leaders_id");
    }

    public function facultyLeaders()
    {
        return $this->belongsTo(FacultyLeaders::class, "faculty_leaders_id");
    }

    public function staffPrograms()
    {
        return   $this->belongsTo(StaffPrograms::class, 'staff_programs_id');
    }

    public function staffMembers()
    {
        return   $this->belongsTo(StaffMembers::class, 'staff_members_id');
    }

    public function  facultyAgentStaff()
    {
        return  $this->belongsTo(FacultyAgentStaff::class);
    }

    public function  leaderCouncil()
    {
        return  $this->belongsTo(LeaderCouncil::class, 'leader_council_id');
    }
}
