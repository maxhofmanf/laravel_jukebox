@extends('layouts.master')

@section('content')
    <h1>Add a Song</h1>


    <form method="POST" action="{{ route('song.store') }}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text" value="{{ old('name') }}">

        @error('name')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text" value="{{ old('author') }}">
        @error('author')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>

        <label>Vul een releasedate voor het liedje in</label>
        <input name="releasedate" type="date" value="{{ old('releasedate') }}">
        @error('releasedate')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>
        <label>Vul een duratie voor het liedje in</label>
        <input name="duration" type="number" value="{{ old('duration') }}">
        @error('duration')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>
        <select name="genre_id">
            @foreach ($genres as $genre)
                <option @if (old('genre_id') == $genre->id) selected @endif value="{{ $genre->id }}">{{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genre_id')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Send me!">
    </form>
@endsection
