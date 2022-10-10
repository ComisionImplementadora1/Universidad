@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear alumno</h2>
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
<form action="/alumnos" method="POST">
    @csrf
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">LU</label>
            <input type="text" class="form-control" id="lu" name="lu" value="{{ old('lu') }}">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento') }}">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" value="{{ old('mail') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Carrera</label>
            <select name="carrera" class="form-select" aria-label="" value="{{ old('carrera') }}">
                @foreach ($carreras as $carrera)
                    <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Contraseña</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Confirmar contraseña</label>
        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
    </div>
    <div class="d-flex justify-content-center">
        <a href="/alumnos" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

@endsection()