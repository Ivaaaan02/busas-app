<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [,
        'descriptive_title',
        'course_code',
        'course_unit',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function programMajor()
    {
        return $this->belongsTo(Program_Major::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function studentRecords()
    {
        return $this->hasMany(Student_Record::class);
    }
}
