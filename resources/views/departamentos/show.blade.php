@extends('layouts.base')

@section('contenido')
<div class="card mx-auto" style="width: 40rem;">
    <div class="card-body">
        <p class="card-title fs-2 text-center">{{$departamento->nombre}}</p>
        <p class="card-subtitle fs-4 my-2">Codigo: {{$departamento->codigo}}</p>

        <p class="card-subtitle fs-5 my-2">Carreras:</p>
        <ul>
            @foreach ($departamento->carreras as $carrera)
                <li>{{$carrera->codigo}} - {{$carrera->nombre}}</li>
            @endforeach
        </ul>

        <div class="container text-center">
        @if (Auth::guard('administrador')->check())
            <a class="btn btn-light" href="/administrador/departamentos">Volver</a>
        @elseif (Auth::guard('alumno')->check())
            <a class="btn btn-light" href="/alumno/departamentos">Volver</a>
        @else
            <a class="btn btn-light" href="/docente/departamentos">Volver</a>
        @endif
        </div>
    </div>
</div>

@endsection