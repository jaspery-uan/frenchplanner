<?php

/**
 * French Learning Tracker Application
 * ICS4U
 * Laura, Joshua, Jasper
 * Controller for managing student reflection submissions:
 * - Displays list and individual views
 * - Creates new reflections
 * - Deletes reflections
 * 
 * History:
 * February 12: File creation
 * April 21: Added all specific adjustments
 * May 22: Added comments
 */

namespace App\Http\Controllers;

use App\Models\Reflections;
use Illuminate\Http\Request;
use App\Models\Classroom;


class ReflectionsController extends Controller
{
    /** These lines display a paginated list of reflections with their classrooms.
     * @return \Illuminate\View\View
     */
    public function index() {
        $students = Reflections::with('classroom')->orderBy('created_at', 'desc')->paginate(10); // Shows newest reflections first, paginates by 10
        return view('reflections.index', ["students" => $students]);
    } 
    
    /** These lines display a specific reflection with its classroom.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $student = Reflections::with('classroom')->findOrFail($id);
        return view('reflections.show', ["student" => $student]);
    }

    /** These lines display the form for creating a new reflection.
     * @return \Illuminate\View\View
     */
    public function create() {
        $classrooms = Classroom::all(); // permitting dropdown in the form
        return view('reflections.create', ["classrooms" => $classrooms]);

    }

    /** These lines handle the creation of a new reflection.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'numberofrefs' => 'required|integer|min:0|max:100', // This assumes a maximum of 100 reflections.
            'nameofmedia' => 'required|string', // The nameofmedia variable is incorrectly named - it actually represents the content of the student's reflections.
            'classroom_id' => 'required|exists:classrooms,id', // Foreign key constraint
        ]);

        Reflections::create($validated); // This saves the reflection to the database.

        return redirect()->route('reflections.index')->with('success', 'Creation reussi!');
    }

    /** These lines handle the deletion of a reflection.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        $student = Reflections::findOrFail($id); // This line finds the model that is to be deleted.
        $student->delete(); // This line deletes the model.

        return redirect()->route('reflections.index')->with('success', 'Suppression reussi!');
    }
}