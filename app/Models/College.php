<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = [
        'college_name',
    ];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
