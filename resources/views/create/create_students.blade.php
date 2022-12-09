@extends('layouts.master')

@section('title')
    <title>Crear Estudiante</title>
@endsection

@section('content')
    <div class="container">
        <div class="mb-4 mt-4">
            <a href="{{ route('create-index') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <header>
            <h2>Agregar Estudiante</h2>
            <p>Crea un nuevo estudiante y agregalo a un curso definido</p>
        </header>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombres">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <select name="course" class="form-control">
                    <option value="">Selecciona un curso</option>
                    @foreach ($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
            </div>
        </form>
    </div>
@endsection