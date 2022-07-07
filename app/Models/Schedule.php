<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'classroom_id',
        'teacher_id',
        'supervisor_id',
        'from_date',
        'to_date',
    ];

    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class, 'schedule_id');
    }
}
