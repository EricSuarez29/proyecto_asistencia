<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentAssistance extends Model
{
    protected $table = 'student_assistance';
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_hour_id',
        'status'
    ];

    public function classHour()
    {
        return $this->hasOne(ClassHour::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
