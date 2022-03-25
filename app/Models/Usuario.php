<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
            'primer_nombre',
            'segundo_nombre' ,
            'tercer_nombre' ,
            'primer_apellido' ,
            'segundo_apellido' ,
            'apellido_casada' ,
            'fecha_nacimiento' , 
            'num_dpi',
            'profesion',
            'foto',
            'anios_laborando' ,
            'salario',
            'email',
            'contrasenia',
            'rol_id',
            'estado_id',
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class);

    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);

    }
    use HasFactory;
}
