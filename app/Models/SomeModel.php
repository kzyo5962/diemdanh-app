<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SomeModel extends Model
{
    use HasFactory;
    protected $modelClass;
    public function __construct($model)
    {
        $modelClass = "App\Models\{$model}}";
        $model = new $modelClass;
    }
}
