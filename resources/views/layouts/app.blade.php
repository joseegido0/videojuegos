<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <nav>
        <!-- Barra de navegación común -->
        <ul>
            <li><a href="{{ route('dashboard') }}">Inicio</a></li>
            <!-- Agrega otros enlaces de navegación aquí si es necesario -->
        </ul>
    </nav>

    <div class="container">
        <!-- Contenido de la página -->
        @yield('content')
    </div>

    <!-- Agrega tus scripts JavaScript aquí -->

    <!-- Ejemplo de uso de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</body>
</html>