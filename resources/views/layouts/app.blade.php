<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Laravel App</title>
    <!-- Agrega aquí tus enlaces a CSS, scripts, etc. -->
</head>
<body>
    <header>
        <!-- Coloca aquí elementos comunes del encabezado -->
    </header>

    <main>
        @yield('content') <!-- Esta sección se reemplazará en las vistas específicas -->
    </main>

    <footer>
        <!-- Coloca aquí elementos comunes del pie de página -->
    </footer>
    <!-- Agrega aquí tus scripts, enlaces a CDN, etc. -->
</body>
</html>
