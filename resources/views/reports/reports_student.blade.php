@extends('layouts.master')

@section('title')
    <title>Reporte estudiante</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Reporte Estudiante: {{$student->name}} {{$student->last_name}}</h1>
        </header>
        <div>
            <p>A continuacion se muestra el resultado o el progreso del estudiante "{{$student->name}}" del curso "{{$courseName->name}}" durante los diferentes procesos del <strong>{{$periodName->name}}</strong></p>
            <div>
                {!! $bar->container() !!}
            </div>
        </div>
        <ul>
            <h5>Procesos detalle</h5>
            @foreach ($processes as $process)
            <li>
                {{$process->name}}- Promedio: {{$process->note}}
                @foreach ($notes as $note)
                        @if ($note->process_id == $process->id)
                            <p>{{$note['title']}} => Nota: {{$note['calification']}}</p>
                        @endif
                    @endforeach
                </li>    
            @endforeach
        </ul>
        <div>
            <h5>Comentarios</h5>
            <ul>
                @foreach ($behaviors as $behavior)
                    <li>{{$behavior->comment}}}</li>
                @endforeach
            </ul>
        </div>
        {!! $bar->script() !!}
    </div>
@endsection