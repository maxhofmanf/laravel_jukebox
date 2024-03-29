@extends('layouts.master')
@section('content')
    @push('title')
        Playlist - details
    @endpush
    <h2>{{ $playlist->name }}</h2>
    {{-- shows duration of the playlist --}}
    <p>
        This playlist duration is:
        <?php $songduration = 0; ?>
        @foreach ($playlist->songs as $song)
            <?php $songduration += $song->duration; ?>
        @endforeach
        {{ $songduration }}
    </p>
    {{--  shows all songs in a playlist --}}
    <ul>
        <?php $i = 0; ?>
        @foreach ($playlist->songs as $song)
            <?php $i++; ?>
            <li value="{{ $song->id }}">
                {{ $i }}. {{ $song->name }} <a
                    href="{{ route('playlist.song_destroy', [$playlistId, 'song_id' => $song->id]) }}">x</a>
            </li>
        @endforeach
    </ul>
    <input type="hidden" name="playlist_id" value="{{ $playlistId }}">
    {{-- goes to the edit page of playlist --}}
    <p><a href="{{ route('playlist.edit', ['playlist' => $playlist->id]) }}">edit this playlist</a></p>
@endsection
