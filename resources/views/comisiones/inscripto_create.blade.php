@extends('layouts.base')

@section('contenido')

    <h2 class="d-flex justify-content-center my-5">Inscriptos en comision {{$comision->codigo}}</h2>
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
    <div id="error_repetido" class="alert alert-dismissible alert-danger mt-4" hidden>
        <strong>Ya existe un inscripto con ese LU</strong>
    </div>
    <div class="d-flex justify-content-center my-5">
        <form action="/administrador/comisiones/{{$comision->id}}/inscriptos/create" method="POST">
            @csrf
            <div class="row d-flex justify-content-center text-center">
                <label for="" class="form-label fs-3">LU</label>
                <input type="text" id="lu" class="form-control" name="lu" value="{{ old('lu') }}" onchange="verificarExistencia()">
                <button type="submit" id="guardar" class="btn btn-success m-2">Guardar</button>
            </div>
        </form>
    </div>
<script>
    const inscriptos = {!!$comision->inscriptos!!};
    
    function verificarExistencia(){
        
        let mensajeError = document.getElementById("error_repetido");
        let botonGuardar = document.getElementById("guardar");
        let lu = document.getElementById("lu");

        mensajeError.hidden = true;
        botonGuardar.enabled = true;

        inscriptos.forEach(inscripto=>{
            if(inscripto.lu == lu.value){
                mensajeError.hidden = false;
                botonGuardar.enabled = false;
            }
        })
        
    }
</script>
@endsection