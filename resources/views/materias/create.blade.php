@extends('layouts.base')

@section('contenido')

<h2 class="d-flex justify-content-center">Crear materia</h2>
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
<form action="/materias" method="POST">
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
        <h3>Correlativas fuertes</h3>
        <div class="col" id="corrFuertes">
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a class="btn btn-warning" onclick="agregarNuevaMateriaFuerte()">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="mb-3">
        <h3>Correlativas debiles</h3>
        <div class="col" id="corrDebiles">
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a class="btn btn-warning" onclick="agregarNuevaMateriaDebil()">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/materias" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

<script>
    var contadorMateriasFuertes = 0;
    var contadorMateriasDebiles = 0;

    function agregarNuevaMateriaFuerte(){
        const divFuertes = document.getElementById('corrFuertes');
        if (contadorMateriasFuertes==0){
            const labelFuertes =  document.createElement('label');
            labelFuertes.classList.add('d-flex');
            labelFuertes.classList.add('justify-content-center');
            labelFuertes.classList.add('fs-3');
            labelFuertes.classList.add('mb-4');
            labelFuertes.innerHTML = "Codigo";
            labelFuertes.setAttribute("id", "labelFuertes");
            divFuertes.appendChild(labelFuertes);
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
        inputMateria.setAttribute("name", "fuertes["+contadorMateriasFuertes+"]");
        
        const eliminarMateria = document.createElement('a');
        eliminarMateria.classList.add('btn');
        eliminarMateria.classList.add('btn-danger');
        eliminarMateria.classList.add('fw-bold');
        eliminarMateria.classList.add('col');
        eliminarMateria.style.width = '5px';

        eliminarMateria.innerHTML = "-";

        divMateria.appendChild(inputMateria);
        divMateria.appendChild(eliminarMateria);
        divFuertes.appendChild(divMateria);

        eliminarMateria.onclick = function() { 
            divFuertes.removeChild(divMateria);
            contadorMateriasFuertes = contadorMateriasFuertes -1;
            if (contadorMateriasFuertes == 0){
                labelFuertes = document.getElementById("labelFuertes");
                divFuertes.removeChild(labelFuertes);
            }
        };

        contadorMateriasFuertes = contadorMateriasFuertes + 1;
    }

    function agregarNuevaMateriaDebil(){
        const divDebiles = document.getElementById('corrDebiles');
        if (contadorMateriasDebiles==0){
            const labelDebiles =  document.createElement('label');
            labelDebiles.classList.add('d-flex');
            labelDebiles.classList.add('justify-content-center');
            labelDebiles.classList.add('fs-3');
            labelDebiles.classList.add('mb-4');
            labelDebiles.innerHTML = "Codigo";
            labelDebiles.setAttribute("id", "labelDebiles");
            divDebiles.appendChild(labelDebiles);
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
        inputMateria.setAttribute("name", "debiles["+contadorMateriasDebiles+"]");
        
        const eliminarMateria = document.createElement('a');
        eliminarMateria.classList.add('btn');
        eliminarMateria.classList.add('btn-danger');
        eliminarMateria.classList.add('fw-bold');
        eliminarMateria.classList.add('col');
        eliminarMateria.style.width = '5px';

        eliminarMateria.innerHTML = "-";

        divMateria.appendChild(inputMateria);
        divMateria.appendChild(eliminarMateria);
        divDebiles.appendChild(divMateria);

        eliminarMateria.onclick = function() { 
            divDebiles.removeChild(divMateria);
            contadorMateriasDebiles = contadorMateriasDebiles -1;
            if (contadorMateriasDebiles == 0){
                labelDebiles = document.getElementById("labelDebiles");
                divDebiles.removeChild(labelDebiles);
            }
        };

        contadorMateriasDebiles = contadorMateriasDebiles + 1;
    }
</script>
@endsection()