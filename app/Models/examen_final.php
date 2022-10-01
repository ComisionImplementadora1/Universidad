<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examen_final extends Model
{
    use HasFactory;

    public function inscriptos(){
        return $this->belongsToMany(alumno::class, 'inscriptos_examenes', 'id_examen', 'id_alumno');
    }
}
