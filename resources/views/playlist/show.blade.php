@extends('layouts.master')
@section('content')
    @push('title')
        Playlist - details
    @endpush
    <h2>{{ $playlist->name }}</h2>
    <p>
        This playlist duration is:
        <?php $songduration = 0; ?>
        @foreach ($playlist->songs as $song)
            <?php $songduration += $song->duration; ?>
        @endforeach
        {{ $songduration }}
    </p>
    <ul>
        <?php $i = 0; ?>
        @foreach ($playlist->songs as $song)
            <?php $i++; ?>
            <li>
                {{ $i }}. {{ $song->name }}
            </li>
        @endforeach
    </ul>
    <form action="{{ route('playlist.addSong') }}" method="POST">
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
