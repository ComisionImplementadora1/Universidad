<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comision extends Model
{
    use HasFactory;

    public function ayudantes(){
        return $this->belongsToMany(docente::class, 'ayudantes', 'id_comision', 'id_ayudante');
    }

    public function inscriptos(){
        return $this->belongsToMany(alumno::class, 'inscriptos_comision', 'id_comision', 'id_alumno');
    }
}
