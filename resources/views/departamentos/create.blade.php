@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear departamento</h2>
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
<form action="/administrador/departamentos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label fs-3">Codigo</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label fs-3">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <h3>Carreras</h3>
        <div class="col" id="carreras">
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a class="btn btn-warning" onclick="agregarNuevaCarrera()">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/administrador/departamentos" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

<script>
    var contadorCarreras = 0;

    function agregarNuevaCarrera(){
        const divCarreras = document.getElementById('carreras');
        if (contadorCarreras==0){
            const labelCarreras =  document.createElement('label');
            labelCarreras.classList.add('d-flex');
            labelCarreras.classList.add('justify-content-center');
            labelCarreras.classList.add('fs-3');
            labelCarreras.classList.add('mb-4');
            labelCarreras.innerHTML = "Codigo";
            labelCarreras.setAttribute("id", "labelCarreras");
            divCarreras.appendChild(labelCarreras);
        }
        const divCarrera =  document.createElement('div');
        divCarrera.classList.add('row');
        divCarrera.classList.add('my-2');
        divCarrera.classList.add('mx-auto');
        divCarrera.style.width = '300px';
        const inputCarrera = document.createElement('input');
        inputCarrera.classList.add('form-control');
        inputCarrera.classList.add('mx-4');
        inputCarrera.setAttribute("type", "text");
        inputCarrera.classList.add('col');
        inputCarrera.setAttribute("name", "carreras["+contadorCarreras+"]");
        
        const eliminarCarrera = document.createElement('a');
        eliminarCarrera.classList.add('btn');
        eliminarCarrera.classList.add('btn-danger');
        eliminarCarrera.classList.add('fw-bold');
        eliminarCarrera.classList.add('col');
        eliminarCarrera.style.width = '5px';

        eliminarCarrera.innerHTML = "-";

        divCarrera.appendChild(inputCarrera);
        divCarrera.appendChild(eliminarCarrera);
        divCarreras.appendChild(divCarrera);

        eliminarCarrera.onclick = function() { 
            divCarreras.removeChild(divCarrera);
            contadorCarreras = contadorCarreras -1;
            if (contadorCarreras == 0){
                labelCarreras = document.getElementById("labelCarreras");
                divCarreras.removeChild(labelCarreras);
            }
        };

        contadorCarreras = contadorCarreras + 1;
    }

</script>

@endsection()