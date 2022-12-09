<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
    ];

    public function getFullName()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function assistances()
    {
        return $this->hasMany(StudentAssistance::class, 'class_hour_id');
    }

    public function getTypeOfAssistanceAt($classHour)
    {
        $assistanceType = $this->assistances()
            ->where('class_hour_id', $classHour->id)
            ->with('assistanceType')
            ->first();

        return $assistanceType ?? ['type' => null];
    }
}
