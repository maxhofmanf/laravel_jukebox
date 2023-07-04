@extends('layouts.master')
@section('content')
    @push('title')
        Song - details
    @endpush

    <h2>{{ $song->name }}</h2>
    <p>author: {{ $song->author }}</p>
    <p>duration: {{ $song->duration }}</p>
    <p>releasedate: {{ $song->releasedate }}</p>
@endsection
