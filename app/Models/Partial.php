<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_first_partial',
        'end_first_partial',
        'start_second_partial',
        'end_second_partial',
        'start_third_partial',
        'end_third_partial',
        'period_id'
    ];
}
