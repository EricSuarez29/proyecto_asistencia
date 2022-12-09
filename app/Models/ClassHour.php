<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'class_day_id'
    ];

    public function assistances()
    {
        return $this->hasMany(StudentAssistance::class, '');
    }
}
