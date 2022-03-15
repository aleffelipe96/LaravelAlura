<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('titulo-aba')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a97615178.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav
            class="navbar navbar-expand-lg navbar-light mb-2 d-flex justify-content-between" style="background-color: #e9ecef;"
        >
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

            @auth
                <a href="{{ route('logout') }}" class="text-danger">Sair</a>
            @endauth

            @guest
                <a href="/entrar">Entrar</a>
            @endguest
        </nav>
        <div class="container">
            <div class="jumbotron">
                <h1>@yield('titulo-cabecalho')</h1>
            </div>

            @yield('conteudo')
        </div>
    </body>
</html>
