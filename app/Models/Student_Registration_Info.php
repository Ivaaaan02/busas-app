<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Registration_Info extends Model
{
    protected $fillable = [
        'last_school_attended',
        'last_year_attended',
        'category',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function acadTerm()
    {
        return $this->belongsTo(Acad_Term::class);
    }
}