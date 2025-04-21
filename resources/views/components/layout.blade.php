<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflexions</title>

    @vite('resources/css/app.css')
    
</head>
<body>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <header>
        <nav>
            <h1>Reflexions</h1>
            <!--a href="{{ route('reflections.index') }}">Tous les reflexions</a!-->
            @guest
            <a href="{{ route('show.login') }}" class="btn">Ouvrir une session</a>
            <a href="{{ route('show.register') }}" class="btn">S'inscrire</a>
            @endguest

            @auth
                <span class="border-r-2 pr-2">
                    Bonjour, {{ Auth::user()->name }}
                </span>
                <a href="{{ route('reflections.create') }}">Creer une reflexion</a>

                <form action="{{route('logout')}}" method="POST" class="m-0">
                    @csrf
                    <button class="btn">Deconnexion</button>
                </form>
            @endauth

    </header>
    <main class="container">
        {{ $slot }}
    </main>

</body>
</html>
