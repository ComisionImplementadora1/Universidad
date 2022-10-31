@extends('layouts.base')

@section('contenido')

    <h2 class="d-flex justify-content-center my-5">Nota alumno {{$alumno->lu}}, {{$alumno->nombre}} {{$alumno->apellido}}</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <h3>Errores:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center my-5">
        <form action="/docente/comisiones/{{$comision->id}}/inscriptos/{{$alumno->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="row d-flex justify-content-center text-center">
                <div class="col text-center">
                    <label for="" class="form-label fs-3">Estado</label>
                    <select id="estado" name="estado" class="form-select" onchange="habilitarNota()">
                        <option value="inscripto">Inscripto</option>
                        <option value="desaprobado">Desaprobado</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="ausente">Ausente</option>
                        <option value="promocionado">Promocionado</option>
                    </select>
                </div>
                <div class="col text-center">
                    <label for="" class="form-label fs-3">Nota</label>
                    <input id="nota" type="text" class="form-control" name="nota" value="{{ old('nota') }}" readonly>
                </div>
                <div class="mt-5">
                <button type="submit" class="btn btn-success m-2">Guardar</button>
                <div>
            </div>
        </form>
    </div>
    <script>
        function habilitarNota(){
            const estado = document.getElementById('estado');
            const nota = document.getElementById('nota');
            if(estado.value == 'promocionado'){
                nota.readOnly = false;
            }else{
                nota.readOnly = true;
            }
        }
    </script>
@endsection