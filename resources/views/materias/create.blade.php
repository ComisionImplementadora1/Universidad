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
<form action="/administrador/materias" method="POST">
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
            <div class="row fs-3 d-flex justify-content-center">
                Código
            </div>
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
            <div class="row fs-3 d-flex justify-content-center">
                Código
            </div>
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
        <a href="/administrador/materias" class="btn btn-danger m-2">Cancelar</a>
        <button type="submit" class="btn btn-success m-2">Guardar</button>
    </div>
</form>

<script>
    var contadorMateriasFuertes = 0;
    var contadorMateriasDebiles = 0;
    const materias = {!!$correlativas!!};

    function agregarNuevaMateriaFuerte(){
        const divFuertes = document.getElementById('corrFuertes');

        const divMateria =  document.createElement('div');
        divMateria.classList.add('row');
        divMateria.classList.add('justify-content-md-center');
        divMateria.classList.add('my-2');
        divMateria.classList.add('mx-auto');
        divMateria.style.width = '500px';
        divMateria.setAttribute("id","div"+contadorMateriasFuertes+"");
        
        const inputMateria = document.createElement('input');
        inputMateria.classList.add('form-control');
        inputMateria.classList.add('mx-4');
        inputMateria.setAttribute("type", "text");
        inputMateria.classList.add('col');
        inputMateria.setAttribute("name", "fuertes["+contadorMateriasFuertes+"]");
        inputMateria.setAttribute("id",""+contadorMateriasFuertes+"");
        inputMateria.setAttribute("onchange", "agregarNombreMateriaFuerte()");
        
        const eliminarMateria = document.createElement('a');
        eliminarMateria.classList.add('btn');
        eliminarMateria.classList.add('btn-danger');
        eliminarMateria.classList.add('fw-bold');
        eliminarMateria.classList.add('col-1');
        eliminarMateria.innerHTML = "-";

        divMateria.appendChild(inputMateria);
        divMateria.appendChild(eliminarMateria);
        divFuertes.appendChild(divMateria);

        eliminarMateria.onclick = function() { 
            divFuertes.removeChild(divMateria);
        };

        contadorMateriasFuertes = contadorMateriasFuertes + 1;
    }

    function agregarNombreMateriaFuerte(){
        const contActual= contadorMateriasFuertes-1;
        const divMateria = document.getElementById("div"+contActual+"");
        divMateria.style.width = '800px';
        const labelNombreMateria = document.createElement('label');
        labelNombreMateria.classList.add('text-center');
        labelNombreMateria.classList.add('my-auto');
        const codigoMateria = document.getElementById(""+contActual+"");
        var nombre = "";
        materias.forEach(materia=>{
            if(materia.codigo == codigoMateria.value){
               nombre = materia.nombre;
               
            }
        })
        labelNombreMateria.innerHTML = ""+nombre+"";
        labelNombreMateria.classList.add('col');

        divMateria.appendChild(labelNombreMateria);
    }
    
    function agregarNuevaMateriaDebil(){
        const divDebiles = document.getElementById('corrDebiles');
        
        const divMateria =  document.createElement('div');
        divMateria.classList.add('row');
        divMateria.classList.add('justify-content-md-center');
        divMateria.classList.add('my-2');
        divMateria.classList.add('mx-auto');
        divMateria.style.width = '500px';
        divMateria.setAttribute("id","divDebil"+contadorMateriasDebiles+"");

        const inputMateria = document.createElement('input');
        inputMateria.classList.add('form-control');
        inputMateria.classList.add('mx-4');
        inputMateria.setAttribute("type", "text");
        inputMateria.classList.add('col');
        inputMateria.setAttribute("name", "debiles["+contadorMateriasDebiles+"]");
        inputMateria.setAttribute("id","debil"+contadorMateriasDebiles+"");
        inputMateria.setAttribute("onchange","agregarNombreMateriaDebil()");

        const eliminarMateria = document.createElement('a');
        eliminarMateria.classList.add('btn');
        eliminarMateria.classList.add('btn-danger');
        eliminarMateria.classList.add('fw-bold');
        eliminarMateria.classList.add('col-1');

        eliminarMateria.innerHTML = "-";

        divMateria.appendChild(inputMateria);
        divMateria.appendChild(eliminarMateria);
        divDebiles.appendChild(divMateria);

        eliminarMateria.onclick = function() { 
            divDebiles.removeChild(divMateria);
        };

        contadorMateriasDebiles = contadorMateriasDebiles + 1;
    }

    function agregarNombreMateriaDebil(){
        const contActual= contadorMateriasDebiles-1;
        const divMateria = document.getElementById("divDebil"+contActual+"");
        divMateria.style.width = '800px';
        const labelNombreMateria = document.createElement('label');
        labelNombreMateria.classList.add('text-center');
        labelNombreMateria.classList.add('my-auto');
        const codigoMateria = document.getElementById("debil"+contActual+"");
        var nombre = "";
        materias.forEach(materia=>{
            if(materia.codigo == codigoMateria.value){
               nombre = materia.nombre;
               
            }
        })
        labelNombreMateria.innerHTML = ""+nombre+"";
        labelNombreMateria.classList.add('col');

        divMateria.appendChild(labelNombreMateria);
    }
</script>
@endsection()