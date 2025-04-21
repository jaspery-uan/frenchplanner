<x-layout>
    <form action="{{ route('reflections.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <h2>Creer un reflexion</h2>

        <label for="name">Nom d'etudiant:</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}" 
            required
        >

        <label for="numberofrefs">Nombre de reflexions:</label>
        <input 
            type="number" 
            id="numberofrefs" 
            name="numberofrefs" 
            required
        >

        <label for="nameofmedia">Les reflexions:</label>
        <textarea
            rows="5"
            id="nameofmedia" 
            name="nameofmedia" 
            required
        ></textarea>

        <label for="classroom_id">Classe:</label>
        <select id="classroom_id" name="classroom_id" required>
            <option value="" disabled selected>Choisir une classe</option>
            @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->code }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn mt-4">Creer le reflexion</button>
    
        @if ($errors->any())
            <ul class="px-4 py-2 bg-purple-100">
                @foreach($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>