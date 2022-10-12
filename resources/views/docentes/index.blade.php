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
                    <a class="btn btn-info" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $docentes->links() !!}
</div>
@endsection()