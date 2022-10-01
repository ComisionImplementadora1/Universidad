<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    use HasFactory;

    public function correlativas_fuertes(){
        return $this->belongsToMany(Materia::class, 'correlativas_fuertes', 'id_materia_origen', 'id_materia_correlativa');
    }

    public function correlativas_debiles(){
        return $this->belongsToMany(Materia::class, 'correlativas_debiles', 'id_materia_origen', 'id_materia_correlativa');
    }
}
