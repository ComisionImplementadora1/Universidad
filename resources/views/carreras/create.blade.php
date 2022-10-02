@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear carrera</h2>
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
<form action="/carreras" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label fs-3">Codigo</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Departamento</label>
        <select id="departamento" name="departamento" class="form-select" value="{{old('nombre')}}" tabindex="1">
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/carreras" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

@endsection()