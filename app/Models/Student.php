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

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function assistances()
    {
        return $this->hasMany(StudentAssistance::class);
    }

    public function getTypeOfAssistanceAt($classHour)
    {
        $assistanceType = $this->assistances()
            ->where('class_hour_id', $classHour->id)
            ->first();

        return $assistanceType ?? ['status' => ''];
    }

    public function getBgColorAssistance($classHour)
    {
        $status = $this->getTypeOfAssistanceAt($classHour)['status'];

        $colors = [
            'A' => 'bg-success text-white',
            'F' => 'bg-danger text-white',
            'J' => 'bg-info text-white',
            'R' => 'bg-warning text-white'
        ];

        return $colors[strtoupper($status)] ?? '';
    }

    public function getPerAssistance($attendanceList)
    {
        $classHoursIds = collect(collect($attendanceList->classDays)->reduce(fn ($carry, $classDay) => [...$carry, $classDay->classHours], []))->flatten(1)->map(fn ($item) => $item->id)->all();
        $assistances = StudentAssistance::where('student_id', $this->id)
            ->whereIn('status', ['r', 'R', 'a', 'A'])
            ->whereIn('class_hour_id', $classHoursIds)->count();
        $classHours = collect($attendanceList->classDays)->reduce(fn ($carry, $classDay) => $carry + $classDay->classHours()->count(), 0);

        return (int) ($assistances * (100 / (int) $classHours));
    }
}
