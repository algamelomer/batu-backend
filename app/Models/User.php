<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function post()
    {
        return $this->hasMany(post::class);
    }

    public function studyPlan()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }

    public function aboutUniversity()
    {
        return $this->hasMany(AboutUniversity::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLinks::class);
    }

    public function politics()
    {
        return $this->hasMany(Politics::class);
    }

    public function leaderCouncil()
    {
        return $this->hasMany(LeaderCouncil::class);
    }

    public function facultyLeaders()
    {
        return $this->hasMany(FacultyLeaders::class);
    }

    public function staffPrograms()
    {
        return $this->hasMany(StaffPrograms::class);
    }

    public function staffMembers()
    {
        return $this->hasMany(StaffMembers::class);
    }

    public function universityLeaders()
    {
        return $this->hasMany(UniversityLeaders::class);
    }

    public function applying()
    {
        return $this->hasMany(Applying::class);
    }

    public function applyStudies()
    {
        return $this->hasMany(ApplyStudies::class);
    }

    public function applyStaff()
    {
        return $this->hasMany(ApplyStaff::class);
    }

    public function studentProjects()
    {
        return $this->hasMany(StudentProjects::class);
    }

    public function  staffSocial()
    {
        return  $this->hasMany(staffSocial::class);
    }

    public function  facultyAgent()
    {
        return  $this->hasMany(FacultyAgent::class);
    }

    public function  facultyAgentStaff()
    {
        return  $this->hasMany(FacultyAgentStaff::class);
    }

}
