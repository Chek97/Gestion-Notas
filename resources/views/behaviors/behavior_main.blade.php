@extends('layouts.master')

@section('title')
    <title>Comportamientos del estudiante</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Crear Comentario</h1>
        </header>
        <form action="{{ route('behavior.store') }}" method="POST">
            @csrf
            <h3>Inserte comentario del estudiante</h3>
            <input type="hidden" name="student" value="{{$id}}">
            <div class="form-group">
                <textarea name="comment" cols="10" rows="5" class="form-control" placeholder="observacion del estudiante..."></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Guarddar</button>
            </div>
        </form>
    </div>
@endsection