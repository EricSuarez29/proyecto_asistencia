<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAttendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'class_date',
        'assistance_type_id',
        'class_day_id'
    ];
}
