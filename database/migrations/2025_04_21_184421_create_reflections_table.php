<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Migration for creating the reflections table:
 * - Stores student reflections
 * - Links each reflection to a classroom
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
     * Run the migrations - creates the reflections table with a foreign key to the classrooms table.
     */
    public function up(): void
    {
        Schema::create('Reflections', function (Blueprint $table) {
            $table->id(); // primary key
            $table->timestamps(); // timestamps for created_at and updated_at
            $table->string('name'); // name of the student
            $table->integer('numberofrefs'); // number of reflections indicated
            $table->text('nameofmedia'); // the content of the reflection
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade'); // foreign key to classroom table, onDelete('cascade') ensures that if a classroom is deleted, all related reflections are also deleted
        });
    }

    /**
     * Reverse the migrations (drops reflections table).
     */
    public function down(): void
    {
        Schema::dropIfExists('Reflections');
    }
};
