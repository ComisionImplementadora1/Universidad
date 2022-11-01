<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\carrera;
use App\Models\comision;
use App\Models\Inscriptos_carreras;
use App\Models\correlativas_debiles;
use App\Models\correlativas_fuertes;
use App\Models\inscriptos_comision;
use Auth;
use Illuminate\Support\Facades\DB;

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
            'apellido' => 'required|regex:/^[\pL\s]+$/u|min:3',
            'lu' => 'required|integer|min:0|unique:alumnos',
            'dni' => 'required|integer|min:0||unique:docentes',
            'fecha_de_nacimiento' => 'required|date',
            'email' => 'required|email',
            'carrera' => 'required',
            'password' => 'required|confirmed',
        ]);

        $alumno = new alumno();

        $alumno->nombre = $request->get('nombre');
        $alumno->apellido = $request->get('apellido');
        $alumno->lu = $request->get('lu');
        $alumno->dni = $request->get('dni');
        $alumno->fecha_de_nacimiento = $request->get('fecha_de_nacimiento');
        $alumno->email = $request->get('email');
        $alumno->id_carrera = $request->get('carrera');
        $alumno->password = bcrypt($request->get('password'));

        $alumno->save();

        return redirect('/administrador/alumnos');
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

    public function inscripcion_carrera($id_carrera){

        $inscripcion_carrera = new Inscriptos_carreras();

        $inscripcion_carrera->id_alumno = Auth::user()->id;
        $inscripcion_carrera->id_carrera = $id_carrera;

        $inscripcion_carrera->save();

        return redirect('/alumno/carreras');
    }

    public function control_correlativas($id_materia){
        
        $correlativas_debiles = correlativas_debiles::where('id_materia_origen',$id_materia)->get();
        $correlativas_fuertes = correlativas_fuertes::where('id_materia_origen',$id_materia)->get();

        $materias_cursada_aprobada = DB::table('materias')
                                        ->join('comisiones', 'materias.id', '=', 'comisiones.id_materia')
                                        ->join('inscriptos_comision', 'comisiones.id', '=', 'inscriptos_comision.id_comision')
                                        ->where('inscriptos_comision.id_alumno', '=', Auth::user()->id)
                                        ->where('inscriptos_comision.estado', '=', 'aprobado')
                                        ->select('materias.id')
                                        ->get();
        
        $materias_cursada_promocionada = DB::table('materias')
                                            ->join('comisiones', 'materias.id', '=', 'comisiones.id_materia')
                                            ->join('inscriptos_comision', 'comisiones.id', '=', 'inscriptos_comision.id_comision')
                                            ->where('inscriptos_comision.id_alumno', '=', Auth::user()->id)
                                            ->where('inscriptos_comision.estado', '=', 'promocionado')
                                            ->select('materias.id')
                                            ->get();

        $materias_final_aprobado = DB::table('materias')
                                    ->join('examenes_finales', 'materias.id', '=', 'examenes_finales.id_materia')
                                    ->join('inscriptos_examenes', 'examenes_finales.id', '=', 'inscriptos_examenes.id_examen')
                                    ->where('inscriptos_examenes.id_alumno', '=', Auth::user()->id)
                                    ->where('inscriptos_examenes.estado', '=', 'aprobado')
                                    ->select('materias.id')
                                    ->get();

        foreach($correlativas_debiles as $correlativa_debil){
            if(!in_array($correlativa_debil->id_materia_origen, (array) $materias_cursada_aprobada) && !in_array($correlativa_debil->id_materia_origen, (array) $materias_cursada_promocionada)){
                return redirect()->back()->with('error', 'No satisface las correlativas debiles');   
            }
        }

        foreach($correlativas_fuertes as $correlativa_fuerte){
            if(!in_array($correlativa_fuerte->id_materia_origen, (array) $materias_final_aprobado) && !in_array($correlativa_fuerte->id_materia_origen, (array) $materias_cursada_promocionada)){
                return redirect()->back()->with('error', 'No satisface las correlativas fuertes');   
            }
        }

        $comisiones = comision::where('id_materia',$id_materia)->get();

        return view('materias.index_comisiones')->with('comisiones',$comisiones);
        
    }

    public function inscripcion_comision($id_comision){
        
        $inscripto_comision = new inscriptos_comision();

        $inscripto_comision->id_alumno = Auth::user()->id;
        $inscripto_comision->id_comision = $id_comision;
        $inscripto_comision->estado = 'inscripto';

        $inscripto_comision->save();

        return redirect('alumno/materias');
    }
}
