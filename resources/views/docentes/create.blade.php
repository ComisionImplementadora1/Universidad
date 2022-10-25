@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear docente</h2>
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
<form action="/administrador/docentes" method="POST">
    @csrf
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Legajo</label>
            <input type="text" class="form-control" id="legajo" name="legajo" value="{{ old('legajo') }}">
        </div>
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="" class="form-label fs-3">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento') }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label fs-3">Mail</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Confirmar contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
    </div>
    <div class="d-flex justify-content-center">
        <a href="/administrador/docentes" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

@endsection()