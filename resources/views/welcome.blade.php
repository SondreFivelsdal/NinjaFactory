<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondre Network</title>

    @vite('resources/css/app.css')

</head>
<body class="text-center px-8 py-12">
    <h1>Welcome to the Sondre network</h1>
    <p>Click the button below to view the list.</p>

    <a href="/sondre" class="btn mt-4 inline-block">
        view list</a>
</body>
</html>
