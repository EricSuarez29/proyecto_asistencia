<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\Exporter\Exporter;

class ClassDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'class_date',
        'hours',
        'attendance_list_id'
    ];

    protected $casts = [
        'class_date' => 'date'
    ];

    public function classHours()
    {
        return $this->hasMany(ClassHour::class);
    }

    public function getFormated()
    {
        return $this->class_date->format('d');
    }
}
