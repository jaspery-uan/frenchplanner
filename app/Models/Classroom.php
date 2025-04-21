<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'code',
        'teacher',
        'studentnum',
    ];
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    public function reflections() {
        return $this->hasMany(Reflections::class);
    }
}
