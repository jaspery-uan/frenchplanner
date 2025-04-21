<x-layout>
    <form action="{{route('login')}}" method="POST">
    @csrf

    <h2>Ouvrir une session</h2>

    <label for="email">Email:</label>
    <input 
        type="email"
        name="email"
        required
        value="{{ old('email') }}"
        placeholder="Entrer votre email"
    >

    <label for="password">Mot de passe:</label>
    <input 
        type="password"
        name="password"
        required
    >

    <button type="submit" class="btn mt-4">Ouvrir</button>

    @if ($errors->any())      
        <ul class="px-4 py-2 bg-purple-100">
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </form>
</x-layout>