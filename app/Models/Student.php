<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    protected $table ="students";

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'sex',
        'address',
        'date_of_birth',
        'place_of_birth',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function graduationInfo()
    {
        return $this->hasOne(Student_Graduation_Info::class);
    }

    public function registrationInfos()
    {
        return $this->hasMany(Student_Registration_Info::class);
    }

    public function records()
    {
        return $this->hasMany(Student_Record::class);
    }
}
