@extends('layouts.base')

@section('contenido')

    <h2 class="d-flex justify-content-center my-5">Ayudante en comision {{$comision->codigo}}</h2>
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
        <form action="/administrador/comisiones/{{$comision->id}}/ayudantes/create" method="POST">
            @csrf
            <div class="row d-flex justify-content-center text-center">
                <label for="" class="form-label fs-3">Legajo</label>
                <input type="text" class="form-control" name="legajo" value="{{ old('legajo') }}">
                <button type="submit" class="btn btn-success m-2">Guardar</button>
            </div>
        </form>
    </div>
@endsection