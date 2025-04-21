<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-9">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste de Reflections</title>
    
    @vite('resources/css/app.css')

</head>
<body class="text-center px-8 py-12">
    <h1>Les reflexions</h1>
    <a href="/reflections" class="btn">
        La liste des reflexions
    </a>
</body>
</html>
