<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'classroom_id',
        'teacher_id',
        'schedule_id',
        'date',
        'attendance_status',
    ];
}
