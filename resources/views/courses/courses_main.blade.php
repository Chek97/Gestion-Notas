@extends('layouts.master')

@section('title')
    <title>Buscar Curso</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Buscar Curso y Periodo</h1>
        </header>
        <form action="{{ route('notes.validate') }}" method="POST">
            @csrf
            <div class="form-group">
                <select name="course" id="" class="form-control">
                    <option value="">Elige un curso</option>
                    @foreach ($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="period" id="" class="form-control">
                    <option value="">Elige un periodo</option>
                    @foreach ($periods as $period)
                        <option value="{{$period->id}}">{{$period->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                {{-- todo: configurar para que o no sea necesario o tenga validaciones para poderse usar --}}
                <button type="submit" class="btn btn-success">Continuar</button>
            </div>
        </form>
    </div>
@endsection