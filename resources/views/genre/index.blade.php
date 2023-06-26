@extends('layouts.master')

@section('content')
    <h1>dit is een totaal overzicht van alle genres</h1>
    <ul>
        @foreach ($genre as $genre)
            <li>{{ $genre->name }} <a href="destroy/{{ $genre->id }}">x</a></li>
        @endforeach
    </ul>
    <p><a href="create/">add a genre </a></p>
@endsection
