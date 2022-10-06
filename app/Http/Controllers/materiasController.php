<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materia;
use App\Models\carrera;
use App\Models\materias_de_carrera;
use App\Models\correlativas_debiles;
use App\Models\correlativas_fuertes;

class materiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = materia::paginate(20);
        return view('materias.index')->with('materias', $materias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = materia::all();
        $carreras = carrera::all();
        return view('materias.create')->with('correlativas', $materias)->with('carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'=> 'required|integer|min:0|unique:materias',
            'nombre'=> 'required|alpha',
            'carrera'=> 'required'
        ]);

        $materia = new materia();

        $materia->codigo = $request->get('codigo');
        $materia->nombre = $request->get('nombre');
        $materia->save();

        $materias_de_carrera = new materias_de_carrera();
        $materias_de_carrera->id_carrera = $request->get('carrera');
        $materias_de_carrera->id_materia = $materia->id;
        $materias_de_carrera->save();

        $carrera2 = $request->get('carrera2');
        if ($carrera2!= ""){
            $materias_de_carrera = new materias_de_carrera();
            $materias_de_carrera->id_carrera = $carrera2;
            $materias_de_carrera->id_materia = $materia->id;
            $materias_de_carrera->save();
        }

        $carrera3 = $request->get('carrera3');
        if ($carrera3!= ""){
            $materias_de_carrera = new materias_de_carrera();
            $materias_de_carrera->id_carrera = $carrera3;
            $materias_de_carrera->id_materia = $materia->id;
            $materias_de_carrera->save();
        }

        $correlativa_fuerte = $request->get('fuerte_1');
        if ($correlativa_fuerte != ""){
           $correlativaNueva = new correlativas_fuertes();
           $correlativaNueva->id_materia_origen = $materia->id;
           $correlativaNueva->id_materia_correlativa = $correlativa_fuerte;
           $correlativaNueva->save();
        }

        $correlativa_fuerte = $request->get('fuerte_2');
        if ($correlativa_fuerte != ""){
           $correlativaNueva = new correlativas_fuertes();
           $correlativaNueva->id_materia_origen = $materia->id;
           $correlativaNueva->id_materia_correlativa = $correlativa_fuerte;
           $correlativaNueva->save();
        }

        $correlativa_debil = $request->get('debil_1');
        if ($correlativa_debil != ""){
           $correlativaNueva = new correlativas_debiles();
           $correlativaNueva->id_materia_origen = $materia->id;
           $correlativaNueva->id_materia_correlativa = $correlativa_debil;
           $correlativaNueva->save();
        }

        $correlativa_debil = $request->get('debil_2');
        if ($correlativa_debil != ""){
           $correlativaNueva = new correlativas_debiles();
           $correlativaNueva->id_materia_origen = $materia->id;
           $correlativaNueva->id_materia_correlativa = $correlativa_debil;
           $correlativaNueva->save();
        }        

        return redirect('/materias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = materia::find($id);
        return view('materias.show')->with('materia', $materia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
