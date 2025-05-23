{{--
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Welcome view for the application (basic landing page with a title and a button linking to the reflections list)
History:
February 12: File creation
April 21: Added all specific adjustments
May 22: Added comments
--}}

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-9">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste de Reflections</title>
    
    @vite('resources/css/app.css')

</head>
<body class="text-center px-8 py-12">
    <h1>Les reflexions</h1>
    <br><br>
    <a href="/reflections" class="btn">
        La liste des reflexions
    </a>
</body>
</html>
