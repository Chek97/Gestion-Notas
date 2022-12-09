@extends('layouts.master')

@section('title')
    <title>Crear Elementos</title>
@endsection

@section('content')
    <div>
        <div class="mb-4 mt-4">
            <a href="{{ route('index') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <header>
            <h1>Crear Nuevos Elementos</h1>
        </header>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Nuevo Curso</a>
        <a href="{{ route('students.create') }}" class="btn btn-success">Nuevo Estudiante</a>
    </div>
@endsection