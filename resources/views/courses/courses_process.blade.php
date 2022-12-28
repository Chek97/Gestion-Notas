@extends('layouts.master')

@section('title')
    <title>Mostrar Procesos</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Notas del Proceso {{$process->name}}</h1>
        </header>
        <ul>
            @foreach ($notes as $note)
                <li>
                    <h5>Titulo: {{$note->title}}</h5>
                    <small>Nota: {{$note->calification}}</small>
                </li>
            @endforeach
        </ul>
    </div>
@endsection