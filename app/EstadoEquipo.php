<?php

namespace App;

enum EstadoEquipo : string
{
    case Recibido = 'Recibido';
    case EnReparacion = 'En Reparación';
    case Reparado = 'Reparado';
    case Entregado = 'Entregado';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            self::Recibido->value => '📦 Recibido',
            self::EnReparacion->value => '🔧 En Reparación',
            self::Reparado->value => '✅ Reparado',
            self::Entregado->value => '📤 Entregado',
        ];
    }
}
