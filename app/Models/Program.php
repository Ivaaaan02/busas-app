<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'program_name',
        'program_abbreviation',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function majors()
    {
        return $this->hasMany(Program_Major::class);
    }

    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
