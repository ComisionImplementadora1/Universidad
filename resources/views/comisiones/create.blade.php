@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Agregar comision de cursado</h2>
@if ($errors->any())
        <div class="alert alert-danger">
            <h3>Errores:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<form action="/administrador/comisiones" method="POST">
    @csrf
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Cupo</label>
            <input type="text" class="form-control" id="cupo" name="cupo" value="{{ old('cupo') }}">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Fecha inicio</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Fecha finalizacion</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}">
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <a href="/administrador/comisiones" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

@endsection()