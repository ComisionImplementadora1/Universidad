@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center my-5">Ayudantes de la comision {{$comision->codigo}}</h2>
<div class="d-flex justify-content-end">
    <a href="/administrador/comisiones/{{$comision->id}}/ayudantes/create" class="btn btn-success">Agregar</a>
</div>
@foreach ($comision->ayudantes as $ayudante)
    <div class="row d-flex align-items-center mt-5">
        <div class="col text-center">
            <label for="" class="form-label fs-3">Legajo</label>
            <input type="text" class="form-control" name="legajo" value="{{$ayudante->legajo}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$ayudante->nombre}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="{{$ayudante->apellido}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Mail</label>
            <input type="text" class="form-control" name="mail" value="{{$ayudante->email}}" readonly>
        </div>
        <form class="col mt-5" action="/administrador/comisiones/{{$comision->id}}/ayudantes/{{$ayudante->id}}" method="POST">
            @csrf
            @method('DELETE') 
                <button class="btn btn-danger">-</button>
        </form>
    </div>
@endforeach
@endsection