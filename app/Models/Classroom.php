<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'phoneNumber',
        'email',
    ];

    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class, 'class_id');
    }
}
