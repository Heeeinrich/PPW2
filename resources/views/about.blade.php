@extends('layout')
@section('about')
    <script src="{{ asset('js/app.js') }}"></script>
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <h3>{{ $email }}</h3>
@endsection

