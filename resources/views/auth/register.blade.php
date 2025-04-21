<x-layout>
    <form action="{{route('register')}}" method="POST">
    @csrf

    <h2>S'inscrire ici!</h2>

    <label for="name">Nom:</label>
    <input 
        type="text"
        name="name"
        required
        value="{{ old('name') }}"  
        placeholder="Entrer votre nom"
    >

    <label for="email">Email:</label>
    <input 
        type="email"
        name="email"
        required
        value="{{ old('email') }}" 
    >

    <label for="password">Mot de passe:</label>
    <input 
        type="password"
        name="password"
        required
    >
    
    <label for="password_confirmation">Confirmez votre mot de passe:</label>
    <input 
        type="password"
        name="password_confirmation"
        required
    >

    <button type="submit" class="btn mt-4">S'inscrire</button>

    @if ($errors->any())      
        <ul class="px-4 py-2 bg-purple-100">
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </form>
</x-layout>