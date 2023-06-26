@extends('layouts.master')

@section('content')
    <h1>Dit is een totaaloverzicht van alle playlists</h1>
    <ul>
        @foreach ($playlists as $playlist)
            <li>{{ $playlist->name }} <a href="destroy/{{ $playlist->id }}">x</a></li>
        @endforeach
    </ul>
    <br>
    <a href="{{ route('playlist.create') }}">Create a playlist</a>
@endsection
