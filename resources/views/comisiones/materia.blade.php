@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center my-5">Materia de la comision {{$comision->codigo}}</h2>
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

@if($materia==null)
    <div class="d-flex justify-content-center my-5">
        <form action="/administrador/comisiones/{{$comision->id}}/materia" method="POST">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center text-center">
                <label for="" class="form-label fs-3">Código</label>
                <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}">
                <button type="submit" class="btn btn-success m-2">Guardar</button>
            </div>
        </form>
    </div>
@else
    <div class="row d-flex align-items-center my-5">
        <div class="col text-center mx-5">
            <label for="" class="form-label fs-3">Código</label>
            <input type="text" class="form-control text-center" name="codigo" value="{{$materia->codigo}}" readonly>
        </div>
        <div class="col text-center">
            <label for="" class="form-label fs-3">Nombre</label>
            <input type="text" class="form-control text-center" name="nombre" value="{{$materia->nombre}}" readonly>
        </div>
        @if (Auth::guard('administrador')->check())
            <form class="col mt-5" data-bs-action="/administrador/comisiones/{{$comision->id}}/materia" action="" method="POST">
                @csrf
                @method('DELETE') 
                    <button class="btn btn-danger">-</button>
            </form>
        @endif
    </div>
    <div class="mt-5 text-center">
        @if (Auth::guard('administrador')->check())
            <a class="btn btn-secondary" href="/administrador/comisiones/">Volver</a>
        @elseif (Auth::guard('docente')->check())
            <a class="btn btn-secondary" href="/docente/comisiones/">Volver</a>
        @endif
    </div>
@endif
@endsection