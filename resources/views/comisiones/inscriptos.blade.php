@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center my-5">Inscriptos de la comision {{$comision->codigo}}</h2>
<div class="d-flex justify-content-end">
    <a href="/administrador/comisiones/{{$comision->id}}/inscriptos/create" class="btn btn-success">Agregar</a>
</div>
@foreach ($comision->inscriptos as $inscripto)
    <div class="row d-flex align-items-center my-5">
        <div class="col text-center">
            <label for="" class="form-label fs-3">LU</label>
            <input type="text" class="form-control" name="lu" value="{{$inscripto->lu}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$inscripto->nombre}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="{{$inscripto->apellido}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Mail</label>
            <input type="text" class="form-control" name="mail" value="{{$inscripto->email}}" readonly>
        </div>
        <form class="col mt-5" action="/administrador/comisiones/{{$comision->id}}/inscriptos/{{$inscripto->id}}" method="POST">
            @csrf
            @method('DELETE') 
                <button class="btn btn-danger">-</button>
        </form>
    </div>
@endforeach
@endsection