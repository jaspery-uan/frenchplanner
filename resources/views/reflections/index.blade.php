{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Index view for reflections:
- Displays a paginated list of reflections ("students" variable)
- Each reflection shows student name, ID, classroom code, and a link to view details
History:
February 12: File creation
April 21: Added all specific adjustments
--}}


<x-layout>
    <h2>Liste de reflexions:</h2>

    <ul>
        @foreach($students as $student)
            <li>
                {{-- Highlight card if numberofrefs > 2 --}}
                <x-card :highlight="$student['numberofrefs'] > 2">
                    <p>{{ $student["name"] }}; ID: {{ $student["id"] }}</p>
                    <div>
                        <p>Classe: {{ $student->classroom->code }}</p>
                    {{-- Button to access the individual reflection by redirecting to reflections.show --}}
                    <a href="{{ route('reflections.show', $student->id) }}" class="btn">
                        Voir la réflexion
                    </a>
                </x-card>

            </li>
        @endforeach
    </ul>

    {{-- Pagination links to organize in groups of 10 --}}
    {{ $students->links()}}

</x-layout>