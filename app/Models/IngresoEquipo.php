<?php

namespace App\Models;

use App\EstadoEquipo;
use Illuminate\Database\Eloquent\Model;

class IngresoEquipo extends Model
{
    protected $fillable = [
        'cliente_id',
        'tipo_equipo_id',
        'marca_id',
        'modelo',
        'serial',
        'accesorios',
        'falla_reportada',
        'fecha_ingreso',
        'estado',
    ];

    protected $casts = [
        'estado' => EstadoEquipo::class,
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function Marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function TipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class);
    }
}
