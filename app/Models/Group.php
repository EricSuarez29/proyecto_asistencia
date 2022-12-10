<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'number',
        'career_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function attendanceList()
    {
        return $this->hasMany(AttendanceList::class);
    }

    public function getFullName()
    {
        return $this->career->acronym . " " . $this->number;
    }
}
