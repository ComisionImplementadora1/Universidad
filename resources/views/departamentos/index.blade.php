@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Departamentos</h1>
<div class="d-flex justify-content-end">
    <a href="alumnos/create" class="btn btn-success">Crear departamento</a>
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
        @foreach ($departamentos as $departamento)
            <tr>
                <td>{{$departamento->codigo}}</td>
                <td>{{$departamento->nombre}}</td>
                <td>
                    <a class="btn btn-info" href="#">Ver carreras</a> 
                    <button class="btn btn-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $departamentos->links() !!}
</div>
@endsection()