<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
    ];

    public function ingresoEquipos()
{
    return $this->hasOne(IngresoEquipo::class);
}
}
