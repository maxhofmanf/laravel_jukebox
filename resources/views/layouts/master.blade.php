<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ url('genre/all') }}">genre</a></li>
            <li><a href="{{ url('song/all') }}">songs</a></li>
            <li><a href="{{ url('playlist/all') }}">playlists</a></li>
        </ul>
    </nav>
    <main>

        {{-- content --}}
        @yield('content')

    </main>
    <footer>&copy; max hofman - laravel 10</footer>
</body>

</html>
