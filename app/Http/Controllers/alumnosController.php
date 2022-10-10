<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\carrera;

class alumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = alumno::paginate(20);
        return view('alumnos.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = carrera::all();
        return view('alumnos.create')->with('carreras', $carreras);
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
            'nombre' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'lu' => 'required|integer|min:0|unique:alumnos',
            'dni' => 'required|integer|min:0||unique:docentes',
            'fecha_de_nacimiento' => 'required|date',
            'mail' => 'required|email',
            'carrera' => 'required',
            'password' => 'required|confirmed',
        ]);

        $alumno = new alumno();

        $alumno->nombre = $request->get('nombre');
        $alumno->lu = $request->get('lu');
        $alumno->dni = $request->get('dni');
        $alumno->fecha_de_nacimiento = $request->get('fecha_de_nacimiento');
        $alumno->mail = $request->get('mail');
        $alumno->id_carrera = $request->get('carrera');
        $alumno->password = bcrypt($request->get('password'));

        $alumno->save();

        return redirect('/alumnos');
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
