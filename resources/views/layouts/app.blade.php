<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de Café</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|PT+Sans:400,700" rel="stylesheet">

    
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="contenedor">
            <div class="barra">
            <a href="{{ route('index') }}">
                    <h1 class="no-margin">Blog<span>DeCafé</span></h1>
                </a>
                <nav class="navegacion">
                    <a href="{{ route('nosotros') }}">Nosotros</a>
                    <a href="{{ route('cursos') }}">Cursos</a>
                    <a href="{{ route('contactar.create')}}">Contacto</a>
                </nav>
            </div><!--barra-->

            <div class="texto-header">
                <h2 class="no-margin">Blog de Café con consejos y Cursos</h2>
                <p class="no-margin">Aprende de los expertos con las mejores recetas y consejos</p>
            </div>

        </div><!--contenedor-->
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="contenedor">
            <div class="barra">
                <p class="no-margin">Blog<span>DeCafé</span></p>

                <nav class="navegacion">
                    <a href="{{ route('nosotros') }}">Nosotros</a>
                    <a href="{{ route('cursos') }}">Cursos</a>
                    <a href="{{ route('contactar.create')}}">Contacto</a>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>