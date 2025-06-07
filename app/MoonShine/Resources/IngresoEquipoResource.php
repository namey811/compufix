<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\EstadoEquipo;
use Illuminate\Database\Eloquent\Model;
use App\Models\IngresoEquipo;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasOne;
use MoonShine\UI\Components\Badge;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<IngresoEquipo>
 */
class IngresoEquipoResource extends ModelResource
{
    protected string $model = IngresoEquipo::class;

    protected string $title = 'IngresoEquipos';

    protected bool $createInModal = true;
 
    protected bool $editInModal = true;
 
    protected bool $detailInModal = true;
    
    /**
     * @return list<FieldContract>
     */
     
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
     
            BelongsTo::make('Cliente', 'cliente', fn($item) => "$item->nombre. $item->apellido") // nombre: campo visible
                 ->searchable()
                 ->required(),
            BelongsTo::make('Equipo', 'TipoEquipo', 'nombre')
                 ->searchable()
                 ->required(),
            BelongsTo::make('Marca', 'Marca', 'nombre')
                 ->searchable()
                 ->required(),
             Text::make('Modelo', 'modelo')->nullable(),
             Text::make('Serial', 'serial')->nullable(),
             Date::make('Fecha de Ingreso', 'fecha_ingreso')->required(),
             Text::make('Estado', 'estado', fn($item) => $item->estado->value)   
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
            ID::make()->sortable(),
            BelongsTo::make('Cliente', 'cliente', fn($item) => "$item->nombre. $item->apellido") // nombre: campo visible
                 ->searchable()
                 ->required(),
            BelongsTo::make('Equipo', 'TipoEquipo', 'nombre')
                 ->searchable()
                 ->required(),
            BelongsTo::make('Marca', 'Marca', 'nombre')
                 ->searchable()
                 ->required(),

            Text::make('Modelo'),
            Text::make('Serial')->nullable(),
            Text::make('Accesorios')->nullable(),

            Textarea::make('Falla Reportada', 'falla_reportada')->required(),

            Date::make('Fecha de Ingreso', 'fecha_ingreso')->required(),

            Select::make('Estado')
                ->options(EstadoEquipo::labels())
                ->default(EstadoEquipo::Recibido->value)
                ->required()
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Cliente', 'cliente', fn($item) => "$item->nombre. $item->apellido"),
            BelongsTo::make('Tipo de Equipo', 'tipoEquipo', 'nombre'),
            BelongsTo::make('Marca', 'marca', 'nombre'),

            Text::make('Modelo'),
            Text::make('Serial')->nullable(),
            Text::make('Accesorios')->nullable(),

            Textarea::make('Falla Reportada', 'falla_reportada')->required(),

            Date::make('Fecha de Ingreso', 'fecha_ingreso')->required(),

            Text::make('Estado', 'estado', fn($item) => $item->estado->value)
        ];
    }

    /**
     * @param IngresoEquipo $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_equipo_id' => 'required|string|max:255',
            'marca_id' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'serial' => 'nullable|string|max:255',
            'accesorios' => 'nullable|string|max:255',
            'falla_reportada' => 'required|string',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:' . implode(',', EstadoEquipo::values()),
        ];
    }
}
