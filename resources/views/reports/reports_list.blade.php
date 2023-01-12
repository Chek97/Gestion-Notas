@extends('layouts.master')

@section('title')
    <title>Buscar Curso</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Lista de estudiantes</h1>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td colspan="2"><a href="{{ route('reports.show', ['id'=> $student->id, 'course' => $course, 'period' => $period]) }}" class="btn btn-warning">Ver Reporte</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection