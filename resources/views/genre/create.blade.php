@extends('layouts.master')
@section('content')
    <form method="POST" action="{{ route('genre.store') }}">
        @csrf
        <label for="name">Geef een genre naam op</label>
        <input name="name" type="text" value="{{ old('name') }}">
        @error('name')
            <span style="font-weight: bold; color: red;">{{ $message }}</span>
        @enderror
    </form>
@endsection
