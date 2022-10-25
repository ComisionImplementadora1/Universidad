<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comision;

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
}
