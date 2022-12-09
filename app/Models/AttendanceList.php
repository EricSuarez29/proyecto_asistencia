<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'period_id',
        'group_id',
        'subject_id',
        'teacher_id'
    ];
}
