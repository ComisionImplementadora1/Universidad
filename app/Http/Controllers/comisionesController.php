<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comision;
use App\Models\docente;
use App\Models\materia;
use App\Models\alumno;
use App\Models\ayudante;
use App\Models\inscriptos_comision;

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
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createAyudante($id)
    {
        $comision = comision::find($id);
        return view('comisiones.ayudantes_create')->with('comision',$comision);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createInscripto($id)
    {
        $comision = comision::find($id);
        return view('comisiones.inscripto_create')->with('comision',$comision);
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
     * Muestra la materia de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMateria($id)
    {
        $comision = comision::find($id);
        if ($comision->id_materia == null){
            $materia = null;
        }else{
            $materia = materia::find($comision->id_materia);
        }
        return view('comisiones.materia')
        ->with('comision',$comision)
        ->with('materia',$materia);
    }

    /**
     * Muestra al asistente de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAsistente($id)
    {
        $comision = comision::find($id);
        if ($comision->id_asistente == null){
            $asistente = null;
        }else{
            $asistente = docente::find($comision->id_asistente);
        }
        return view('comisiones.asistente')
        ->with('comision',$comision)
        ->with('asistente',$asistente);
    }

    /**
     * Muestra a los ayudantes de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAyudantes($id)
    {
        $comision = comision::find($id);
        return view('comisiones.ayudantes')
        ->with('comision',$comision);
    }

    /**
     * Muestra a los inscriptos de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInscriptos($id)
    {
        $comision = comision::find($id);
        return view('comisiones.inscriptos')
        ->with('comision',$comision);
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
     * Carga el materia en la comision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeMateria(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|numeric|exists:materias',
        ]);

        $materia = materia::where('codigo', $request->get('codigo'))->first();
        $comision = comision::find($id);
        $comision->id_materia = $materia->id;
        $comision->save();

        return redirect('/administrador/comisiones');
    }

    /**
     * Carga al asistente en la comision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAsistente(Request $request, $id)
    {
        $request->validate([
            'legajo' => 'required|numeric|exists:docentes',
        ]);

        $asistente = docente::where('legajo', $request->get('legajo'))->first();
        $comision = comision::find($id);
        $comision->id_asistente = $asistente->id;
        $comision->save();

        return redirect('/administrador/comisiones');
    }

    /**
     * Carga al ayudante en la comision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAyudante(Request $request, $id)
    {
        $request->validate([
            'legajo' => 'required|numeric|exists:docentes',
        ]);

        $ayudanteNuevo = new ayudante();
        $ayudanteNuevo->id_comision = $id;
        $ayudante = docente::where('legajo', $request->get('legajo'))->first();
        $ayudanteNuevo->id_ayudante = $ayudante->id;
        $ayudanteNuevo->save();

        return redirect('/administrador/comisiones/');
    }

    /**
     * Carga al inscripto en la comision.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeInscripto(Request $request, $id)
    {
        $request->validate([
            'lu' => 'required|numeric|exists:alumnos',
        ]);

        $inscriptoNuevo = new inscriptos_comision();
        $inscriptoNuevo->id_comision = $id;
        $inscripto = alumno::where('lu', $request->get('lu'))->first();
        $inscriptoNuevo->id_alumno = $inscripto->id;
        $inscriptoNuevo->save();

        return redirect('/administrador/comisiones/');
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

    /**
     * Desvincula a la materia de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMateria($id)
    {
        $comision = comision::find($id);
        $comision->id_materia = null;
        $comision->save();
        return redirect('/administrador/comisiones');
    }

    /**
     * Desvincula al asistente de la comision.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAsistente($id)
    {
        $comision = comision::find($id);
        $comision->id_asistente = null;
        $comision->save();
        return redirect('/administrador/comisiones');
    }

    /**
     * Desvincula al ayudante de la comision.
     *
     * @param  int  $id
     * @param  int  $id_ayudante
     * @return \Illuminate\Http\Response
     */
    public function deleteAyudante($id, $id_ayudante)
    {
        $ayudante = ayudante::where(['id_ayudante' => $id_ayudante, 'id_comision' => $id])->first();
        $ayudante->delete();
        return redirect('/administrador/comisiones');
    }

    /**
     * Desvincula al inscripto de la comision.
     *
     * @param  int  $id
     * @param  int  $id_inscripto
     * @return \Illuminate\Http\Response
     */
    public function deleteInscripto($id, $id_inscripto)
    {

    }
}
