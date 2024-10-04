<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum_Acad_Term extends Model
{
    protected $fillable = [
        //'curricula_id',
        //'acad_term_id',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function acadTerm()
    {
        return $this->belongsTo(Acad_Term::class);
    }
}