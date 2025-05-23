<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Model for Reflections entity:
 * - Represents a reflection with a name, number of reflections, and reflection content
 * - Defines relationship to classrooms
 *
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reflections extends Model
{
    /** The following lines define the table associated with the model and allows for the safe creation and updating of the entries.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'numberofrefs',
        'nameofmedia',
        'classroom_id',
    ];
    use HasFactory;

    /** The following lines define the relationship between the Reflections and Classroom models (each reflection belongs to a classroom).
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}