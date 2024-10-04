<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Record extends Model
{
    protected $fillable = [
        'final_grade',
        'removal_rating',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function acadTerm()
    {
        return $this->belongsTo(Acad_Term::class);
    }
}