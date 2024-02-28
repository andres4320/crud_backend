<!-- resources/views/municipalities/show.blade.php -->
@extends('layouts.app') <!-- Asume que tienes un layout principal -->

@section('content')
    <h1>Municipality Details</h1>
    <p>Name: {{ $municipality->name }}</p>
    <p>Departament ID: {{ $municipality->departaments_id }}</p>
    <!-- Agrega más detalles según tu modelo -->
@endsection
