<?php

namespace App\Http\Controllers;

use App\Models\Reflections;
use Illuminate\Http\Request;
use App\Models\Classroom;


class ReflectionsController extends Controller
{
    public function index() {
        $students = Reflections::with('classroom')->orderBy('created_at', 'desc')->paginate(10);
        return view('reflections.index', ["students" => $students]);
    } 
    

    public function show($id) {
        $student = Reflections::with('classroom')->findOrFail($id);
        return view('reflections.show', ["student" => $student]);
    }

    public function create() {
        $classrooms = Classroom::all();
        return view('reflections.create', ["classrooms" => $classrooms]);

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'numberofrefs' => 'required|integer|min:0|max:100',
            'nameofmedia' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Reflections::create($validated);

        return redirect()->route('reflections.index')->with('success', 'Creation reussi!');
    }

    public function destroy($id) {
        $student = Reflections::findOrFail($id);
        $student->delete();

        return redirect()->route('reflections.index')->with('success', 'Suppression reussi!');
    }
}
