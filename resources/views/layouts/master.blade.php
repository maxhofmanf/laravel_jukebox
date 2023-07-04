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
    {{-- nav --}}
    <nav id="nav">
        <ul class="horizontal-menu">
            <li><a href="{{ url('genre/all') }}">Genre</a></li>
            <li><a href="{{ url('song/all') }}">Songs</a></li>
            <li><a href="{{ url('playlist/all') }}">Playlists</a></li>

            @guest

                <li> | <a href="{{ route('login') }}">Login</a></li>
                <li> <a href="{{ route('register') }}">Register</a>
                @else
                <li>
                    | <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
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
    </nav>

    <main>

        {{-- content --}}
        @yield('content')

    </main>
    <footer>&copy; max hofman - laravel 10</footer>
</body>

</html>
