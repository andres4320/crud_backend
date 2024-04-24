<!-- resources/views/municipalities/edit.blade.php -->
@extends('layouts.app') <!-- Asume que tienes un layout principal -->

@section('content')
    <h1>Edit Municipality</h1>

    <form method="POST" action="{{ route('municipalities.update', $municipality->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $municipality->name }}" required>
        
        <label for="departaments_id">Departament ID:</label>
        <input type="number" name="departaments_id" value="{{ $municipality->departaments_id }}" required>
        
        <button type="submit">Update</button>
    </form>
@endsection
