@extends('layouts.master')

@section('title')
    <title>Nueva Nota</title>
@endsection

@section('content')
    <div class="container">
        <header>
            <h1>Agregar Nueva Nota</h1>
        </header>
        <form action="{{ route('main.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="title" placeholder="titulo" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="note" placeholder="Calificacion" class="form-control" min="0" max="5" step="any">
            </div>
            <div class="form-group">
                <select name="process" id="" class="form-control">
                    @foreach ($process as $pro)
                        @if ($pro->name != 'promedio')
                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection