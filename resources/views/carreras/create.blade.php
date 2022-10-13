@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear carrera</h2>
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
<form action="/carreras" method="POST">
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
        <h3>Materias</h3>
        <div class="col" id="materias">
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a class="btn btn-warning" onclick="agregarNuevaMateria()">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/carreras" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

<script>
    var contadorMaterias = 0;

    function agregarNuevaMateria(){
        const divMaterias = document.getElementById('materias');
        if (contadorMaterias==0){
            const labelMaterias =  document.createElement('label');
            labelMaterias.classList.add('d-flex');
            labelMaterias.classList.add('justify-content-center');
            labelMaterias.classList.add('fs-3');
            labelMaterias.classList.add('mb-4');
            labelMaterias.innerHTML = "Codigo";
            labelMaterias.setAttribute("id", "labelMaterias");
            divMaterias.appendChild(labelMaterias);
        }
        const divMateria =  document.createElement('div');
        divMateria.classList.add('row');
        divMateria.classList.add('my-2');
        divMateria.classList.add('mx-auto');
        divMateria.style.width = '300px';
        const inputMateria = document.createElement('input');
        inputMateria.classList.add('form-control');
        inputMateria.classList.add('mx-4');
        inputMateria.setAttribute("type", "text");
        inputMateria.classList.add('col');
        inputMateria.setAttribute("name", "materias["+contadorMaterias+"]");
        
        const eliminarMateria = document.createElement('a');
        eliminarMateria.classList.add('btn');
        eliminarMateria.classList.add('btn-danger');
        eliminarMateria.classList.add('fw-bold');
        eliminarMateria.classList.add('col');
        eliminarMateria.style.width = '5px';

        eliminarMateria.innerHTML = "-";

        divMateria.appendChild(inputMateria);
        divMateria.appendChild(eliminarMateria);
        divMaterias.appendChild(divMateria);

        eliminarMateria.onclick = function() { 
            divMaterias.removeChild(divMateria);
            contadorMaterias = contadorMaterias -1;
            if (contadorMaterias == 0){
                labelMaterias = document.getElementById("labelMaterias");
                divMaterias.removeChild(labelMaterias);
            }
        };

        contadorMaterias = contadorMaterias + 1;
    }

</script>

@endsection()