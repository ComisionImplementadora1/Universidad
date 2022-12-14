<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Alumno extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function historial_materias(){
        return $this->belongsToMany(cursado_nota::class, 'historial_materias', 'id_alumno', 'id_nota');
    }

    public function carreras_inscripto(){
        return $this->belongsToMany(carrera::class, 'inscriptos_carreras', 'id_alumno', 'id_carrera');
    }

    public function comisiones_inscripto(){
        return $this->belongsToMany(comision::class, 'inscriptos_comision', 'id_comision', 'id_alumno');
    }
}
