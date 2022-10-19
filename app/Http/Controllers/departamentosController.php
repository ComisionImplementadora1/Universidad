<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\departamento;
use App\Models\carrera;
use App\Models\carreras_de_departamento;

class departamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = departamento::paginate(20);
        return view('departamentos.index')->with('departamentos',$departamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
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
            'codigo'=> 'required|alpha|unique:departamentos',
            'nombre'=> 'required',
            'carreras.*' => 'sometimes|alpha_num|distinct|exists:carreras,codigo|unique:carreras_de_departamentos,cod_carrera',
        ]);

        $departamento = new departamento();

        $departamento->codigo = $request->get('codigo');
        $departamento->nombre = $request->get('nombre');

        $departamento->save();

        $carreras = (array) $request->input('carreras');
        foreach ($carreras as $carrera){
            $carreraNueva = new carreras_de_departamento();
            $carreraNueva->id_departamento = $departamento->id;
            $carr = carrera::where('codigo',$carrera)->first();
            $carreraNueva->id_carrera = $carr->id;
            $carreraNueva->cod_carrera = $carr->codigo;
            $carreraNueva->save();
        }

        return redirect('/administrador/departamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = departamento::find($id);
        return view('departamentos.show')->with('departamento',$departamento);
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
