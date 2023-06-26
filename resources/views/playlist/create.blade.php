@extends('layouts.master')

@section('content')
    <h1>Add a Playlist</h1>
    <form method="POST" action="{{ route('playlist.store') }}">
        @csrf
        <label>Vul een naam voor de playlist in</label>
        <input name="name" type="text">
        @error('name')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>


        <input type="submit" value="Send me!">
    </form>
@endsection
