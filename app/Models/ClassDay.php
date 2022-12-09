<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_date',
        'hours',
        'attendance_list_id'
    ];
}
