<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class docentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = docente::orderBy('id', 'asc')->paginate(20);

        return view('docentes.index')->with('docentes',$docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
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
            'nombre' => 'required|string',
            'legajo' => 'required|integer|unique:docentes',
            'dni' => 'required|integer|unique:docentes',
            'fecha_de_nacimiento' => 'required|date',
            'mail' => 'required|email'
        ]);

        $docente = new docente();

        $docente->nombre = $request->get('nombre');
        $docente->legajo = $request->get('legajo');
        $docente->dni = $request->get('dni');
        $docente->fecha_de_nacimiento = $request->get('fecha_de_nacimiento');
        $docente->mail = $request->get('mail');

        $docente->save();

        return redirect('/docentes');
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
