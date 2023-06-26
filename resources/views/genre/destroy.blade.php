@extends('layouts.master')
@section('content')
    <form method="POST" action="{{ route('genre.destroy') }}">
        @csrf
        <label for="name">Geef een genre id op</label>
        <input name="genre" type="text">
    </form>
@endsection
