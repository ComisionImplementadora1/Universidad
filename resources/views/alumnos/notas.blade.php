@extends('layouts.base')

@section('contenido')

<div class="d-flex justify-content-center">
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block"> {{ $message }} </div>
    @endif
</div>

<h1 class="d-flex justify-content-center">Notas de materias</h1>
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Nota</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($materias as $materia)
            <tr>
                <td>{{$materia->codigo}}</td>
                <td>{{$materia->nombre}}</td>
                <td>{{$materia->estado}}</td>
                @if($materia->nota != null)
                    <td>{{$materia->nota}}</td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection()