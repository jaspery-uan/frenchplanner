{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Show view for a single reflection (displays detailed information about one student's reflection)
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<x-layout>
    <h2>Eleve: {{ $student->name }}, ID: {{ $student->id }}</h2>
    <a href="/reflections" class="btn">
        Retourner a la liste
    </a>

    {{-- Reflection details --}}
    <div class="bg-gray-100 p-4 rounded">
        <p><strong>Nombre de reflexions:</strong> {{ $student->numberofrefs }}</p>
        <p><strong>Mes reflexions:</strong></p>
        <p>{{ $student->nameofmedia }}</p>
    </div>

    {{-- Classroom details --}}
    <div class="border-2 bg-white px-4 pb-4 my-4 rounded">
        <h3>Salle de classe</h3>
        <p><strong>Code:</strong> {{ $student->classroom->code }}</p>
        <p><strong>Enseignant:</strong> {{ $student->classroom->teacher }}</p>
    </div>

    {{-- Delete reflection form --}}
    <form action="{{ route('reflections.destroy', $student->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <p>Voulez-vous vraiment supprimer cette reflexion?</p>
        <button class="btn bg-red-300 text=white" type="submit">Supprimer</button>
    </form>

</x-layout>