@extends('layouts.master')
@section('content')
    @push('title')
        {{ $playlist->name }} - details
    @endpush
@endsection
