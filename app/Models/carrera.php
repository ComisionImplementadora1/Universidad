<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;

    public function materias(){
        return $this->belongsToMany(materia::class, 'materias_de_carreras', 'id_carrera', 'id_materia');
    }

    public function alumnos_inscriptos(){
        return $this->belongsToMany(Alumno::class, 'inscriptos_carreras', 'id_alumno', 'id_carrera');
    }
}
