@extends('layouts.base')

@section('contenido')
<div class="card mx-auto mt-8" style="width: 40rem;">
    <div class="card-body">
        <p class="card-title fs-2 text-center">{{$carrera->nombre}}</p>
        <p class="card-subtitle fs-4 my-2">Codigo: {{$carrera->codigo}}</p>

        <p class="card-subtitle fs-5 my-2">Materias:</p>
        <ul>
            @foreach ($carrera->materias as $materia)
                <li>{{$materia->codigo}} - {{$materia->nombre}}</li>
            @endforeach
        </ul>

        <div class="container text-center">
            <a class="btn btn-light" href="/carreras">Volver</a>
        </div>
    </div>
</div>

@endsection