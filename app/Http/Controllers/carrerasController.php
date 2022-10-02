<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrera;
use App\Models\departamento;

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
        $departamentos_array = [];
        foreach($carreras as $carrera){
            $departamentos_array = Arr::add($departamentos_array, $carrera->departamento_id, Departamento::find($carrera->departamento_id)->nombre);
        } 

        return view('carrera.index')->with('carreras',$carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = carrera::all();
        $departamentos = departamento::all();
        return view('carrera.create')->with('carreras',$carreras)->with('departamentos',$departamentos);
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
            'codigo'=> 'required|int|unique',
            'nombre'=> 'required'
        ]);

        $carrera = new carrera();

        $carrera->codigo = $request->get('codigo');
        $carrera->nombre = $request->get('nombre');

        $carrera->save();

        return redirect('/carreras');
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