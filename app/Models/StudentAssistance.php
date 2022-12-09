<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssistance extends Model
{
    protected $table = 'student_assistance';
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_hour_id',
        'assistance_type_id'
    ];

    public function assistanceType()
    {
        return $this->hasOne(AssistanceType::class, 'id', 'assistance_type_id');
    }
}