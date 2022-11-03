@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center my-5">Profesor en comision {{$comision->codigo}}</h2>
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

@if($profesor==null)
    <div class="d-flex justify-content-center my-5">
        <form action="/administrador/comisiones/{{$comision->id}}/profesor" method="POST">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center text-center">
                <label for="" class="form-label fs-3">Legajo</label>
                <input type="text" class="form-control" name="legajo" value="{{ old('legajo') }}">
                <button type="submit" class="btn btn-success m-2">Guardar</button>
            </div>
        </form>
    </div>
@else
    <div class="row d-flex align-items-center mt-5">
        <div class="col text-center">
            <label for="" class="form-label fs-3">Legajo</label>
            <input type="text" class="form-control" name="legajo" value="{{$profesor->legajo}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$profesor->nombre}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="{{$profesor->apellido}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Mail</label>
            <input type="text" class="form-control" name="mail" value="{{$profesor->email}}" readonly>
        </div>
        <form class="col mt-5" data-bs-action="/administrador/comisiones/{{$comision->id}}/profesor" action="" method="POST">
            @csrf
            @method('DELETE') 
                <button class="btn btn-danger">-</button>
        </form>
    </div>
@endif
@endsection