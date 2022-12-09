@extends('layouts.master')

@section('title')
    <title>Gestion De Notas</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Gestion De Notas 2.0</h1>
        </header>
        <div>
            <a href="{{ route('create-index') }}" class="btn btn-primary">Agregar cursos o estudiantes</a>
            <a href="#" class="btn btn-success">Agregar notas</a>
            <a href="#" class="btn btn-info">Obtener reportes de estudiantes</a>
        </div>
    </div>
@endsection