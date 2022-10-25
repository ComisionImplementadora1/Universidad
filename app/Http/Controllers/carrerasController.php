<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\carrera;
use App\Models\departamento;
use App\Models\Inscriptos_carreras;
use App\Models\materia;
use App\Models\materias_de_carrera;
use Auth;

class carrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = carrera::paginate(20);
        
        $carreras_inscripto_array = Inscriptos_carreras::where('id_alumno', Auth::user()->id)->pluck('id_carrera')->toArray();;
        
        $carreras_inscripto = carrera::whereIn('id',$carreras_inscripto_array)->get();
        $carreras_no_inscripto = carrera::whereNotIn('id',$carreras_inscripto_array)->get();
        
        return view('carreras.index')
            ->with('carreras',$carreras)
            ->with('carreras_inscripto',$carreras_inscripto)
            ->with('carreras_no_inscripto',$carreras_no_inscripto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = departamento::all();
        return view('carreras.create')->with('departamentos',$departamentos);
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
            'codigo'=> 'required|unique:carreras',
            'nombre'=> 'required',
            'materias.*' => 'sometimes|alpha_num|distinct|exists:materias,codigo',
        ]);

        $carrera = new carrera();

        $carrera->codigo = $request->get('codigo');
        $carrera->nombre = $request->get('nombre');
        $carrera->save();

        $materias = (array) $request->input('materias');
        foreach ($materias as $materia){
            $materiaNueva = new materias_de_carrera();
            $materiaNueva->id_carrera = $carrera->id;
            $mat = materia::where('codigo',$materia)->first();
            $materiaNueva->id_materia = $mat->id;
            $materiaNueva->save();
        }

        return redirect('/administrador/carreras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = carrera::find($id);
        return view('carreras.show')->with('carrera',$carrera);
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
