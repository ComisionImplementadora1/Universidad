@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Carreras</h1>
@if (Auth::guard('administrador')->check())
    <div class="d-flex justify-content-end">
        <a href="carreras/create" class="btn btn-success">Crear carreras</a>
    </div>
@endif
<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Materias</th>
            @if (Auth::guard('administrador')->check())
                <th scope="col">Acciones</th>
            @endif
            @if (Auth::guard('alumno')->check())
                <th scope="col">Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody class="text-center">
        <!-- VISTA DE ALUMNO -->
        @if (Auth::guard('alumno')->check())
            @foreach($carreras_inscripto as $carrera_ins)
                <tr>
                    <td>{{$carrera_ins->codigo}}</td>
                    <td>{{$carrera_ins->nombre}}</td>
                    <td>
                        <a class="btn btn-info" href="carreras/{{$carrera_ins->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a> 
                    </td>
                    <td>
                        <a class="btn btn-danger" href="#">Desinscribirse</a> 
                    </td>
                </tr>
            @endforeach
            @foreach($carreras_no_inscripto as $carrera_no_ins)
                <tr>
                    <td>{{$carrera_no_ins->codigo}}</td>
                    <td>{{$carrera_no_ins->nombre}}</td>
                    <td>
                        <a class="btn btn-info" href="carreras/{{$carrera_no_ins->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a> 
                    </td>
                    <td>
                        <a class="btn btn-success" href="/alumno/inscripcion-carrera/{{$carrera_no_ins->id}}">Inscribirse</a> 
                    </td>
                </tr>
            @endforeach
        @else
        <!-- VISTA DEL RESTO -->
            @foreach ($carreras as $carrera)
                <tr>
                    <td>{{$carrera->codigo}}</td>
                    <td>{{$carrera->nombre}}</td>
                    <td>
                        <a class="btn btn-info" href="carreras/{{$carrera->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </a> 
                    </td>
                    @if (Auth::guard('administrador')->check())
                        <td>
                            <a class="btn btn-info" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a> 
                        </td>
                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {!! $carreras->links() !!}
</div>
@endsection()