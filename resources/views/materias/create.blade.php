@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear materia</h2>
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
<form action="/materias" method="POST">
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
        <label for="" class="form-label fs-3">Carrera/s</label>
        <select name="carrera" class="form-select mt-2 mb-2" aria-label="" value="{{ old('carrera') }}">
            @foreach ($carreras as $carrera)
                <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
            @endforeach
        </select>
        <select name="carrera2" class="form-select mt-2 mb-2" aria-label="" value="{{ old('carrera2') }}">
            <option value=""></option>
            @foreach ($carreras as $carrera)
                <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
            @endforeach
        </select>
        <select name="carrera3" class="form-select mt-2 mb-2" aria-label="" value="{{ old('carrera3') }}">
            <option value=""></option>
            @foreach ($carreras as $carrera)
                <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <h3>Correlativas fuertes</h3>
        <select name= "fuerte_1" class="form-select mt-2 mb-2" aria-label="" value="{{ old('fuerte_1') }}">
            <option selected value="">No tiene</option>
            @foreach ($correlativas as $correlativa)
                <option value="{{$correlativa->id}}">{{$correlativa->nombre}}</option>
            @endforeach
        </select>
        <select name= "fuerte_2" class="form-select mt-2 mb-2" aria-label="" value="{{ old('fuerte_2') }}">
            <option selected value="">No tiene</option>
            @foreach ($correlativas as $correlativa)
                <option value="{{$correlativa->id}}">{{$correlativa->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <h3>Correlativas debiles</h3>
        <select name= "debil_1" class="form-select mt-2 mb-2" aria-label="" value="{{ old('debiles_1') }}">
            <option selected value="">No tiene</option>
            @foreach ($correlativas as $correlativa)
                <option value="{{$correlativa->id}}">{{$correlativa->nombre}}</option>
            @endforeach
        </select>
        <select name= "debil_2" class="form-select mt-2 mb-2" aria-label="" value="{{ old('debiles_2') }}">
            <option selected value="">No tiene</option>
            @foreach ($correlativas as $correlativa)
                <option value="{{$correlativa->id}}">{{$correlativa->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/materias" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

@endsection()