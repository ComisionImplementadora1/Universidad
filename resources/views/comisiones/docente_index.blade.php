@extends('layouts.base')

@section('contenido')
<h1 class="d-flex justify-content-center">Comisiones de cursado</h1>

<table class="table table-secondary text-center mt-5">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Inscriptos</th>
            <th scope="col">Fecha inicio</th>
            <th scope="col">Fecha finalizacion</th>
            <th scope="col">Materia</th>
            <th scope="col">Cupos</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($comisiones as $comision)
            <tr>
                <td>{{$comision->codigo}}</td>
                <td>
                    <a class="btn btn-info" href="/docente/comisiones/{{$comision->id}}/inscriptos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </a> 
                </td>
                <td>{{$comision->fecha_inicio}}</td>
                <td>{{$comision->fecha_fin}}</td>
                <td>
                    <a class="btn btn-info" href="/docente/comisiones/{{$comision->id}}/materia">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </a> 
                </td>
                <td>{{$comision->cupo}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection()