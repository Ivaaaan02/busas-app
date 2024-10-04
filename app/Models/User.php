<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = [
        'employee_no',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }

    public function colleges()
    {
        return $this->hasMany(College::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function programMajors()
    {
        return $this->hasMany(Program_Major::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function acadYears()
    {
        return $this->hasMany(Acad_Year::class);
    }

    public function acadTerms()
    {
        return $this->hasMany(Acad_Term::class);
    }

    public function signatories()
    {
        return $this->hasMany(Signatory::class);
    }

    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function studentGraduationInfos()
    {
        return $this->hasMany(Student_Graduation_Info::class);
    }

    public function studentRegistrationInfos()
    {
        return $this->hasMany(Student_Registration_Info::class);
    }

    public function studentRecords()
    {
        return $this->hasMany(Student_Record::class);
    }
}
