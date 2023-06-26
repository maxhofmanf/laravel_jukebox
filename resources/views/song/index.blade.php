@extends('layouts.master')

@section('content')
    <h1>Dit is een totaaloverzicht van alle Songs</h1>
    <ul>
        @foreach ($songs as $song)
            <li>{{ $song->name }} - {{ $song->author }} | Released in {{ $song->releasedate }} | is found in playlist:
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
