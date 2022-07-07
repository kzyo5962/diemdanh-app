<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'phoneNumber',
        'email',
        'status',
        'shift',
        'admin_id',
    ];

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class, 'supervisor_id', 'id');
    }
}
