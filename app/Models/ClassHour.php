<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Support\Str;

class ClassHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'class_day_id'
    ];

    public function assistances()
    {
        return $this->hasMany(StudentAssistance::class);
    }

    public function getTotalAssistances()
    {
        return collect($this->assistances)->filter(fn ($item) => strtolower($item->status) === 'a' || strtolower($item->status) === 'r')->count();
    }
}
