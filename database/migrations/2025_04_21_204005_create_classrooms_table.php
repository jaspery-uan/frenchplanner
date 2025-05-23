<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Migration for creating the classroom table:
 * - Stores classrooms
 * 
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations - creates the classrooms table.
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code'); // classroom code
            $table->text('teacher'); // teacher name
            $table->integer('studentnum'); // irrelevant table feature
        });
    }

    /**
     * Reverse the migrations - drops classroom table.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
