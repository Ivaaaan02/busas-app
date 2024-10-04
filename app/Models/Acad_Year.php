<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acad_Year extends Model
{
    protected $fillable = [
        'year',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function acadTerms()
    {
        return $this->hasMany(Acad_Term::class);
    }

    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }
}