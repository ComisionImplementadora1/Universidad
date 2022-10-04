@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Alumnos</h1>
<div class="d-flex justify-content-end">
    <a href="alumnos/create" class="btn btn-success">Crear alumno</a>
</div>
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">LU</th>
            <th scope="col">DNI</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Mail</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->lu}}</td>
                <td>{{$alumno->dni}}</td>
                <td>{{$alumno->fecha_de_nacimiento}}</td>
                <td>{{$alumno->mail}}</td>
                <td>
                    <button class="btn btn-warning">Inscripciones</button>
                    <button class="btn btn-danger">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $alumnos->links() !!}
</div>
@endsection()