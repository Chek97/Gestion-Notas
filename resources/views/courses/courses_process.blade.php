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
                    <a href="{{ route('main.edit',  ['main' => $note->id, 'student' => $student, 'period' => $period]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('main.destroy',  ['main' => $note->id, 'student' => $student, 'period' => $period, 'process' => $process->id]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection