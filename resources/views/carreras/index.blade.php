@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Carreras</h1>
<div class="d-flex justify-content-end">
    <a href="carreras/create" class="btn btn-success">Crear carreras</a>
</div>
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($carreras as $carrera)
            <tr>
                <td>{{$carrera->codigo}}</td>
                <td>{{$carrera->nombre}}</td>
                <td>
                    <a class="btn btn-info" href="carreras/{{$carrera->id}}">Ver Materias</a> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $carreras->links() !!}
</div>
@endsection()