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
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        @foreach ($processes as $process)
                            @if ($process['student'] == $student->id)
                                <td><a href="#">{{$process['note']}}</a></td>
                            @endif
                        @endforeach
                        <td><a href="#" class="btn btn-success">Agregar Nota</a></td>
                        <td><a href="#" class="btn btn-info">Agregar Comportamiento</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection