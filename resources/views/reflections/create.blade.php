{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Create Reflection view:
- Displays a form for users to create a new reflection submission
- Includes fields for student name, number of reflections, media description, and classroom selection
- Shows validation errors if the form submission fails
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<x-layout>
    <form action="{{ route('reflections.store') }}" method="POST">
        @csrf {{-- CSRF token for security --}}

        <h2>Creer un reflexion</h2>

        {{-- Student name input --}}
        <label for="name">Nom d'etudiant:</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}" {{-- preserving old input if validation fails --}}
            required
        >

        {{-- Number of reflections input --}}
        <label for="numberofrefs">Nombre de reflexions:</label>
        <input 
            type="number" 
            id="numberofrefs" 
            name="numberofrefs" 
            required
        >

        {{-- Reflection text input --}}
        <label for="nameofmedia">Les reflexions:</label>
        <textarea
            rows="5"
            id="nameofmedia" 
            name="nameofmedia" 
            required
        ></textarea>

        {{-- Classroom dropdown selection --}}
        <label for="classroom_id">Classe:</label>
        <select id="classroom_id" name="classroom_id" required>
            <option value="" disabled selected>Choisir une classe</option>
            @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->code }}</option>
            @endforeach
        </select>
        
        {{-- Submit button --}}
        <button type="submit" class="btn mt-4">Creer le reflexion</button>
    
        {{-- Validation errors display --}}
        @if ($errors->any())
            <ul class="px-4 py-2 bg-purple-100">
                @foreach($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>