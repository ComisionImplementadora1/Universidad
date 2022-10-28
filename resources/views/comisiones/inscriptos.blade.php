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
        @if (Auth::guard('administrador')->check())
            <form class="col mt-5" action="/administrador/comisiones/{{$comision->id}}/inscriptos/{{$inscripto->id}}" method="POST">
                @csrf
                @method('DELETE') 
                    <button class="btn btn-danger">-</button>
            </form>
        @elseif (Auth::guard('docente')->check())
            <div class="col text-center">
                <label for="" class="form-label fs-3">Estado</label>
                <input type="text" class="form-control" name="estado" value="" readonly>
            </div>
            <div class="col text-center">
                <label for="" class="form-label fs-3">Nota</label>
                <input type="text" class="form-control" name="nota" value="" readonly>
            </div>
            <a class="col mt-5 btn btn-info" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            </a>
        @endif
       
    </div>
@endforeach
@endsection