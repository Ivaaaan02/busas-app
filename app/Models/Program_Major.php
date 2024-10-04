<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Major extends Model
{
    protected $fillable = [
        'program_major_name',
        'program_major_abbreviation',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
       