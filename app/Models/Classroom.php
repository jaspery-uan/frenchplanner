<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Model for Classroom entity:
 * - Represents a classroom with a teacher and student count
 * - Defines relationship to reflections
 *
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** The following lines define the table associated with the model and allows for the safe creation and updating of the entries.
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'teacher',
        'studentnum',
    ];
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    /** The following lines define the relationship between the Classroom and Reflections models (each classroom has many reflections).
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reflections() {
        return $this->hasMany(Reflections::class);
    }
}
