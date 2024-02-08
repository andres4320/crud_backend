<!-- resources/views/municipalities/create.blade.php -->
@extends('layouts.app') <!-- Asume que tienes un layout principal -->

@section('content')
    <h1>Create Municipality</h1>

    <form method="POST" action="{{ route('municipalities.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="departament_id">Departament ID:</label>
        <input type="number" name="departament_id" required>
        
        <button type="submit">Create</button>
    </form>
@endsection
