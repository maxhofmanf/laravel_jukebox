@extends('layouts.master')

@section('content')
    <h1>Dit is een totaaloverzicht van alle Songs</h1>
    <select name="genreSelect" id="genreSelect">
        <option value="all">all</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <ul>

        @foreach ($songs as $song)
            <li><a href="{{ route('song.show', ['id' => $song->id]) }}">{{ $song->name }}</a> - {{ $song->author }} |
                Released in {{ $song->releasedate }} | is found in playlist:
                @foreach ($song->playlists as $playlist)
                    {{ $playlist->name }};
                @endforeach

                <a href="destroy/{{ $song->id }}">x</a>
            </li>
        @endforeach
    </ul>
    <br>
    <a href="{{ route('song.create') }}">Create a song</a>
@endsection
