@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Docentes</h1>
<div class="d-flex justify-content-end">
    <a href="docentes/create" class="btn btn-success">Crear docente</a>
</div>
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Legajo</th>
            <th scope="col">DNI</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Mail</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($docentes as $docente)
            <tr>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->legajo}}</td>
                <td>{{$docente->dni}}</td>
                <td>{{$docente->fecha_de_nacimiento}}</td>
                <td>{{$docente->mail}}</td>
                <td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $docentes->links() !!}
</div>
@endsection()