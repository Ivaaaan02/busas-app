<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Graduation_Info extends Model
{
    protected $fillable = [
        'graduation_date',
        'board_approval',
        'latin_honor',
        'gwa',
        'nstp_no',
    ];
    protected $casts = [
        'gwa' => 'float',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}