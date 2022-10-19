@extends('layouts.base')

@section('contenido')
<div class="card mx-auto mt-8" style="width: 40rem;">
    <div class="card-body">
        <p class="card-title fs-2 text-center">{{$materia->nombre}}</p>
        <p class="card-subtitle fs-4 my-2">Codigo: {{$materia->codigo}}</p>

        <p class="card-subtitle fs-5 my-2">Correlativas fuertes:</p>
        <ul>
            @foreach ($materia->correlativas_fuertes as $corr)
                <li>{{$corr->codigo}} - {{$corr->nombre}}</li>
            @endforeach
        </ul>

        <p class="card-subtitle fs-5 my-2">Correlativas debiles:</p>
        <ul>
            @foreach ($materia->correlativas_debiles as $corr)
                <li>{{$corr->codigo}} - {{$corr->nombre}}</li>
            @endforeach
        </ul>

        <div class="container text-center">
            @if (Auth::guard('administrador')->check())
                <a class="btn btn-light" href="/administrador/materias">Volver</a>
            @elseif (Auth::guard('alumno')->check())
                <a class="btn btn-light" href="/alumno/materias">Volver</a>
            @else
                <a class="btn btn-light" href="/docente/materias">Volver</a>
            @endif
        </div>
    </div>
</div>

@endsection