@extends('layouts.master')

@section('title')
    <title>Lista del curso {{$course}}</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Lista de estudiantes</h1>
        </header>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Comprension Lectora</th>
                    <th>Argumentacion</th>
                    <th>Socio-Personal</th>
                    <th>Solucion de Problemas</th>
                    <th>Promedio</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        @foreach ($processes as $process)
                            @if ($process['student'] == $student->id)
                                @if ($process['name'] == 'promedio')
                                    <td>{{$process['note']}}</td>
                                @else
                                    <td><a href="{{ route('main.show', ['main' => $process['id'], 'student' => $student->id, 'period' => $period]) }}">{{$process['note']}}</a></td>
                                @endif
                            @endif
                        @endforeach
                        <td><a href="{{ route('main.create', ['id' => $student->id, 'period' => $period]) }}" class="btn btn-success">Agregar Nota</a></td>
                        <td><a href="#" class="btn btn-info">Agregar Comportamiento</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection