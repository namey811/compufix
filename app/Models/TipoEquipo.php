<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    protected $fillable =["nombre", "descripcion"];

    public function ingresoEquipos()
    {
        return $this->hasOne(IngresoEquipo::class);
    }
}
