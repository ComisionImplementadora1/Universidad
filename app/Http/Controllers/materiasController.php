<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materia;
use App\Models\carrera;
use App\Models\materias_de_carrera;
use App\Models\correlativas_debiles;
use App\Models\correlativas_fuertes;
use App\Models\Inscriptos_carreras;
use App\Models\inscriptos_comision;
use App\Models\comision;
use App\Rules\CorrelativasRule;
use Auth;
use Arr;

class materiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias_visibles = [];
        $materias_inscripto = [];
        $materias_no_inscripto = [];
        $carreras_inscripto_array = Inscriptos_carreras::where('id_alumno', Auth::user()->id)->pluck('id_carrera')->toArray();
        $carreras_inscripto = carrera::whereIn('id',$carreras_inscripto_array)->get();
        
        foreach($carreras_inscripto as $carrera){
            $materias_array = materias_de_carrera::where('id_carrera', $carrera->id)->pluck('id_materia')->toArray();
            $materias = materia::whereIn('id',$materias_array)->get();
            
            foreach($materias as $materia){
                if(!in_array($materia, $materias_visibles)){
                    $materias_visibles = Arr::add($materias_visibles, $materia->id ,$materia);
                }
            }

            $comisiones_inscripto_array = inscriptos_comision::where('id_alumno', Auth::user()->id)->get();
            foreach($comisiones_inscripto_array as $comision_inscripto){
                $comision = comision::find($comision_inscripto->id_comision);
                $materia_aux = materia::find($comision->id_materia);
                $materias_inscripto = Arr::add($materias_inscripto, $materia_aux->id, $materia_aux);
            }

            foreach($materias_visibles as $materia_visible){
                if(!in_array($materia_visible, $materias_inscripto)){
                    $materias_no_inscripto = Arr::add($materias_no_inscripto, $materia_visible->id, $materia_visible);
                }
            }
        }

        $materias = materia::paginate(20);

        return view('materias.index')
            ->with('materias',$materias)
            ->with('materias_inscripto',$materias_inscripto)
            ->with('materias_no_inscripto',$materias_no_inscripto);
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
        $fuertes = $request->input('fuertes');
        $request->validate([
            'codigo'=> 'required|alpha_num|min:0|unique:materias',
            'nombre'=> 'required|regex:/(^[\pL0-9 ]+)$/u|min:3',
            'fuertes.*' => 'sometimes|alpha_num|distinct|exists:materias,codigo',
            'debiles.*' => [
                'sometimes','alpha_num','distinct','exists:materias,codigo', 
                new CorrelativasRule($fuertes)]
        ]);

        $materia = new materia();

        $materia->codigo = $request->get('codigo');
        $materia->nombre = $request->get('nombre');
        $materia->save();      
        
        foreach ((array) $fuertes as $fuerte){
            $fuerteNueva = new correlativas_fuertes();
            $fuerteNueva->id_materia_origen = $materia->id;
            $correlativa = materia::where('codigo',$fuerte)->first();
            $fuerteNueva->id_materia_correlativa = $correlativa->id;
            $fuerteNueva->save();
        }

        $debiles = $request->input('debiles');
        foreach ((array) $debiles as $debil){
            $debilNueva = new correlativas_debiles();
            $debilNueva->id_materia_origen = $materia->id;
            $correlativa = materia::where('codigo',$debil)->first();
            $debilNueva->id_materia_correlativa = $correlativa->id;
            $debilNueva->save();
        }

        return redirect('/administrador/materias');
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
