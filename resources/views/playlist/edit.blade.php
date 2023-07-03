@extends('layouts.master')

@section('content')
    <form action="{{ route('playlist.update', $playlist->id) }}" method="POST">
        @csrf

        <label for="name">edit de naam van de playlist:</label>
        <input name="name" type="text" value="{{ $playlist->name }}">
        <button type="submit">change Name</button>

    </form>
    <form action="{{ route('playlist.addSong', $playlist->id) }}" method="POST">
        @csrf

        <input type="hidden" name="playlist_id" value="{{ $playlistId }}">

        <label for="song_id">Song:</label>
        <select name="song_id" id="song_id">
            @foreach ($songs as $song)
                <option value="{{ $song->id }}">{{ $song->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add Song</button>
    </form>
@endsection
