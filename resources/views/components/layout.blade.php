{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Main layout component (provides common HTML structure for all pages and includes header navigation with conditional links based on authorization state)
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflexions</title>

    @vite('resources/css/app.css') {{-- Loads CSS via Vite --}}

</head>
<body>
    {{-- Show success messages from session, if any --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <header>
        <nav>
            <h1>Reflexions</h1>
            {{-- Links shown only to guests (unauthenticated users) --}}
            @guest
            <a href="{{ route('show.login') }}" class="btn">Ouvrir une session</a>
            <a href="{{ route('show.register') }}" class="btn">S'inscrire</a>
            @endguest

            {{-- Links and info shown only to authenticated users --}}
            @auth
                <span class="border-r-2 pr-2">
                    Bonjour, {{ Auth::user()->name }}
                </span>
                <a href="{{ route('reflections.create') }}">Creer une reflexion</a>

                {{-- Logout form --}}
                <form action="{{route('logout')}}" method="POST" class="m-0">
                    @csrf
                    <button class="btn">Deconnexion</button>
                </form>
            @endauth

    </header>
    <main class="container">
        {{ $slot }} {{-- Main place to render content from child views (variable to be filled with other formatting code) --}}
    </main>

</body>
</html>
