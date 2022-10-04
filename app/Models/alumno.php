<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    use HasFactory;

    public function historial_materias(){
        return $this->belongsToMany(cursado_nota::class, 'historial_materias', 'id_alumno', 'id_nota');
    }

}
