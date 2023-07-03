@extends('layouts.master')
@section('content')
    @push('title')
        Song - details
    @endpush
    <h2>{{ $song->name }}</h2>
@endsection
