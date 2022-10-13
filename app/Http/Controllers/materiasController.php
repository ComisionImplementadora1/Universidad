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
        return view('materias.create')->with('correlativas', $materias);
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
            'codigo'=> 'required|alpha_num|min:0|unique:materias',
            'nombre'=> 'required|regex:/^[\pL\s]+$/u|min:3',
            'fuertes.*' => 'sometimes|alpha_num|distinct|exists:materias,codigo',
            'debiles.*' => 'sometimes|alpha_num|distinct|exists:materias,codigo'
        ]);

        $materia = new materia();

        $materia->codigo = $request->get('codigo');
        $materia->nombre = $request->get('nombre');
        $materia->save();      
        
        $fuertes = $request->input('fuertes');
        foreach ((array) $fuertes as $fuerte){
            $fuerteNueva = new correlativas_fuertes();
            $fuerteNueva->id_materia_origen = $materia->id;
            $correlativa = materia::where('codigo',$fuerte)->first();
            $fuerteNueva->id_materia_correlativa = $correlativa->id;
            $fuerteNueva->save();
        }

        $debiles = $request->input('debiles');
        foreach ((array) $debiles as $debil){
            if (in_array($debil, $fuertes)){
                return redirect()->back()->withErrors("Correlativa fuerte y debil coincide");   
            }
            $debilNueva = new correlativas_debiles();
            $debilNueva->id_materia_origen = $materia->id;
            $correlativa = materia::where('codigo',$debil)->first();
            $debilNueva->id_materia_correlativa = $correlativa->id;
            $debilNueva->save();
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
