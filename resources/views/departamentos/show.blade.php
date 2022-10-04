@extends('layouts.base')

@section('contenido')
<div class="card mx-auto" style="width: 40rem;">
    <div class="card-body">
        <p class="card-title fs-2 text-center">{{$departamento->nombre}}</p>
        <p class="card-subtitle fs-4 my-2">Codigo: {{$departamento->codigo}}</p>

        <p class="card-subtitle fs-5 my-2">Carreras:</p>
        <ul>
            @foreach ($carreras as $carrera)
                <li>{{$carrera->codigo}} - {{$carrera->nombre}}</li>
            @endforeach
        </ul>

        <div class="container text-center">
            <a class="btn btn-light" href="/departamentos">Volver</a>
        </div>
    </div>
</div>

@endsection