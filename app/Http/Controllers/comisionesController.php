<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comision;
use App\Models\docente;

class comisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comisiones = comision::paginate(20);
        return view('comisiones.index')->with('comisiones',$comisiones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comisiones.create');
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
            'codigo' => 'required|alpha_num|unique:comisiones',
            'cupo' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'
        ]);

        $comision = new comision();
        $comision->codigo = $request->get('codigo');
        $comision->cupo = $request->get('cupo');
        $comision->fecha_inicio = $request->get('fecha_inicio');
        $comision->fecha_fin = $request->get('fecha_fin');

        $comision->save();

        return redirect('/administrador/comisiones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Muestra el profesor de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfesor($id)
    {
        $comision = comision::find($id);
        if ($comision->id_profesor == null){
            $profesor = null;
        }else{
            $profesor = docente::find($comision->id_profesor);
        }
        return view('comisiones.profesor')
        ->with('comision',$comision)
        ->with('profesor',$profesor);
    }

    /**
     * Carga el profesor en la comision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeProfesor(Request $request, $id)
    {
        $request->validate([
            'legajo' => 'required|numeric|exists:docentes',
        ]);

        $profesor = docente::where('legajo', $request->get('legajo'))->first();
        $comision = comision::find($id);
        $comision->id_profesor = $profesor->id;
        $comision->save();

        return redirect('/administrador/comisiones');
    }

    /**
     * Desvincula al profesor de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProfesor($id)
    {
        $comision = comision::find($id);
        $comision->id_profesor = null;
        $comision->save();
        return redirect('/administrador/comisiones');
    }
}
