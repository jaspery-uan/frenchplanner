<x-layout>
    <h2>Liste de reflexions:</h2>

    <ul>
        @foreach($students as $student)
            <li>
                <x-card :highlight="$student['numberofrefs'] > 2">
                    <p>{{ $student["name"] }}; ID: {{ $student["id"] }}</p>
                    <div>
                        <p>Classe: {{ $student->classroom->code }}</p>
                    <a href="{{ route('reflections.show', $student->id) }}" class="btn">
                        Voir la réflexion
                    </a>
                </x-card>

            </li>
        @endforeach
    </ul>

    {{ $students->links()}}

</x-layout>