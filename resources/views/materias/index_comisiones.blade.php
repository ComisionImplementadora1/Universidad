@extends('layouts.base')

@section('contenido')

<div class="d-flex justify-content-center">
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block"> {{ $message }} </div>
    @endif
</div>

<h1 class="d-flex justify-content-center">Comisiones de la materia</h1>
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            @if (Auth::guard('alumno')->check())
                <th scope="col">Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($comisiones as $comision)
            <tr>
                <td>{{$comision->codigo}}</td>
                <td>
                    <a class="btn btn-success" href="inscripcion-comision/{{$comision->id}}">Inscribirse</a> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection()