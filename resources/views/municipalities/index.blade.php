<!-- resources/views/municipalities/index.blade.php -->
@extends('layouts.app') <!-- Asume que tienes un layout principal -->

@section('content')
    <h1>Municipalities</h1>
    <a href="{{ route('municipalities.create') }}">Create New Municipality</a>

    @foreach($municipalities as $municipality)
        <p>{{ $municipality->name }} - {{ $municipality->departaments_id }}</p>
        <!-- Agrega más detalles según tu modelo -->
    @endforeach
@endsection
