<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassHour extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_date',
        'class_day_id'
    ];
}
