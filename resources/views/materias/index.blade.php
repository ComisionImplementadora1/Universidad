@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Materias</h1>
<div class="d-flex justify-content-end">
    <a href="materias/create" class="btn btn-success">Crear materia</a>
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
        @foreach ($materias as $materia)
            <tr>
                <td>{{$materia->codigo}}</td>
                <td>{{$materia->nombre}}</td>
                <td>
                    <a class="btn btn-info" href="">Ver correlativas</a> 
                    <button class="btn btn-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $materias->links() !!}
</div>
@endsection()