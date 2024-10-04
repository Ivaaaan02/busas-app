<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'curriculum_name',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
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

    public function programCurricula()
    {
        return $this->hasMany(Program_Curriculum::class);
    }

    public function curriculaAcadTerms()
    {
        return $this->hasMany(Curriculum_Acad_Term::class);
    }
}