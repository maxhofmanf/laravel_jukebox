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
    <nav id="nav">
        <ul>
            <li><a href="{{ url('genre/all') }}">Genre</a></li>
            <li><a href="{{ url('song/all') }}">Songs</a></li>
            <li><a href="{{ url('playlist/all') }}">Playlists</a></li>

            @guest

                <li> | <a href="{{ route('login') }}">Login</a></li>
            @else
                <li>
                    | <a href="{{ route('dashboard') }}">Welcome, {{ Auth::user()->name }}</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>

                </li>

            @endguest
        </ul>


        <main>

            {{-- content --}}
            @yield('content')

        </main>
        <footer>&copy; max hofman - laravel 10</footer>
</body>

</html>
