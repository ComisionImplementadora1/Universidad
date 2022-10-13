<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;

    public function carreras(){
        return $this->belongsToMany(carrera::class, 'carreras_de_departamentos', 'id_departamento', 'id_carrera');
    }
}
