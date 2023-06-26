@extends('layouts.master')
@section('content')
    <form method="POST" action="{{ route('song.destroy') }}">
        @csrf
        <label for="name">Geef een song id op</label>
        <input name="song" type="text">
    </form>
@endsection
