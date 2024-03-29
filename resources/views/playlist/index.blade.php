@extends('layouts.master')

@section('content')
    {{-- shows all playlists in the database --}}
    <h1>Dit is een totaaloverzicht van alle playlists</h1>
    <ul>
        @foreach ($playlists as $playlist)
            <li><a href="{{ route('playlist.show', ['id' => $playlist->id]) }}">{{ $playlist->name }} </a><a
                    href="destroy/{{ $playlist->id }}">x</a>
            </li>
        @endforeach
    </ul>
    <br>
    {{-- add a playlist --}}
    <a href="{{ route('playlist.create') }}">Create a playlist</a>
@endsection
