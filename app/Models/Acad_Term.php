<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acad_Term extends Model
{
    protected $fillable = [
        'acad_term',
    ];

    public function acadYear()
    {
        return $this->belongsTo(Acad_Year::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function studentRegistrationInfos()
    {
        return $this->hasMany(Student_Registration_Info::class);
    }

    public function studentRecords()
    {
        return $this->hasMany(Student_Record::class);
    }

    public function curriculaAcadTerms()
    {
        return $this->hasMany(Curriculum_Acad_Term::class);
    }
}