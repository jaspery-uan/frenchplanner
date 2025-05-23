{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Registration page view:
- Displays form for new user sign-up
- Includes validation error display and CSRF protection
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<x-layout>
    <form action="{{route('register')}}" method="POST">
    @csrf {{-- Laravel CSRF protection --}}

    <h2>S'inscrire ici!</h2>

    {{-- Name input --}}
    <label for="name">Nom:</label>
    <input 
        type="text"
        name="name"
        required
        value="{{ old('name') }}"  
        placeholder="Entrer votre nom"
    >

    {{-- Email input --}}
    <label for="email">Email:</label>
    <input 
        type="email"
        name="email"
        required
        value="{{ old('email') }}" 
    >

    {{-- Password input --}}
    <label for="password">Mot de passe:</label>
    <input 
        type="password"
        name="password"
        required
    >
    
    {{-- Password confirmation input --}}
    <label for="password_confirmation">Confirmez votre mot de passe:</label>
    <input 
        type="password"
        name="password_confirmation"
        required
    >

    {{-- Submit button --}}
    <button type="submit" class="btn mt-4">S'inscrire</button>

    {{-- Validation error list --}}
    @if ($errors->any())      
        <ul class="px-4 py-2 bg-purple-100">
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </form>
</x-layout>