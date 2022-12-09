@extends('layouts.master')

@section('title')
    <title>Crear Cursos</title>
@endsection

@section('content')
    <div class="container">
        <div class="mb-4 mt-4">
            <a href="{{ route('create-index') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <header>
            <h2>Agregar Nuevo Curso</h2>
            <p>Crea un nuevo curso</p>
        </header>
        <form action="{{ route('course.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombres">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
            </div>
        </form>
    </div>
@endsection