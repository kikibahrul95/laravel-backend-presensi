<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attedence extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'schedule_latitude',
        'schedule_latitude',
        'schedule_start_time',
        'schedule_end_time',
        'latitude',
        'longitude',
        'start_time',
        'end_time'

    ];
}
