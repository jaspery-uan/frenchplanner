<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reflections extends Model
{
    protected $fillable = [
        'name',
        'numberofrefs',
        'nameofmedia',
        'classroom_id',
    ];
    use HasFactory;

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}