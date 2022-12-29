@extends('layouts.master')

@section('title')
    <title>Editar Nota</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Editar Nota: {{$note->title}}</h1>
        </header>
        <form action="{{ route('main.update', $note->id) }}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="student_id" value="{{$student}}">
            <input type="hidden" name="period_id" value="{{$period}}">
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{$note->title}}">
            </div>
            <div class="form-group">
                <input type="number" name="note" placeholder="Calificacion" class="form-control" min="0" max="5" step="any" value="{{$note->calification}}">
            </div>
            <div class="form-group">
                <input type="text" readonly name="process" class="form-control" value="{{$processes->id}}">
            </div>
            <div class="text-center">
                <button class="btn btn-success" type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection