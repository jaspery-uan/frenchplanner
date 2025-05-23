{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Login page view:
- Displays a form for users to log in with email and password
- Includes error handling and CSRF protection
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<x-layout>
    <form action="{{route('login')}}" method="POST">
    @csrf {{-- Laravel CSRF token for form security --}}

    <h2>Ouvrir une session</h2>

    {{-- Email input field --}}
    <label for="email">Email:</label>
    <input 
        type="email"
        name="email"
        required
        value="{{ old('email') }}" {{-- If verification failes, then the email stays --}}
        placeholder="Entrer votre email"
    >

    {{-- Password input field --}}
    <label for="password">Mot de passe:</label>
    <input 
        type="password"
        name="password"
        required
    >

    {{-- Submit button --}}
    <button type="submit" class="btn mt-4">Ouvrir</button>

    {{-- Validation errors display - shows error in red --}}
    @if ($errors->any())      
        <ul class="px-4 py-2 bg-purple-100">
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </form>
</x-layout>