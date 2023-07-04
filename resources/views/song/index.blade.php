@extends('layouts.master')

@section('content')
    <h1>Dit is een totaaloverzicht van alle Songs</h1>

    <ul>

        <form action="{{ route('song.index') }}" method="GET">

            <label for="genre">Select Genre:</label>

            <select name="genre">

                <option value="" {{ old('genre') }}>all genres</option>

                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}</option>
                @endforeach

            </select>

            <button type="submit">Filter</button>

        </form>
        @foreach ($songs as $song)
            <li><a href="{{ route('song.show', ['id' => $song->id]) }}">{{ $song->name }}</a> - {{ $song->author }} |
                Released in {{ $song->releasedate }}

                <a href="destroy/{{ $song->id }}">x</a>
            </li>
        @endforeach
    </ul>
    <br>
    <a href="{{ route('song.create') }}">Create a song</a>
@endsection
