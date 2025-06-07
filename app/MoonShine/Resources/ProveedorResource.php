<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Text;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Proveedor>
 */
class ProveedorResource extends ModelResource
{
    use WithRolePermissions;
    
    protected string $model = Proveedor::class;

    protected string $title = 'Proveedores';

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
            Text::make('Cédula', 'cedula'),
            Text::make('Nombre', 'nombre'),
            Text::make('Apellido', 'apellido'),
            Text::make('Dirección', 'direccion'),
            Text::make('Teléfono', 'telefono'),
            Email::make('Correo', 'correo'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                Text::make('Cédula', 'cedula')->required(),
                Text::make('Nombre', 'nombre')->required(),
                Text::make('Apellido', 'apellido')->required(),
                Text::make('Dirección', 'direccion')->required(),
                Text::make('Teléfono', 'telefono')->required(),
                Email::make('Correo', 'correo')->required(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Cédula', 'cedula'),
            Text::make('Nombre', 'nombre'),
            Text::make('Apellido', 'apellido'),
            Text::make('Dirección', 'direccion'),
            Text::make('Teléfono', 'telefono'),
            Email::make('Correo', 'correo'),
        ];
    }
    protected function search(): array
    {
        return ['cedula', 'nombre', 'apellido','telefono','correo'];
    }
    

    /**
     * @param Cliente $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        $id = $item->id ?? 'NULL';
        return [
            'cedula' => 'required|string|max:20|unique:clientes,cedula,' . $id,
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|unique:clientes,correo,' . $id,
        ];
    }

    public function validationMessages(): array
    {
        return [
            'cedula.required' => 'Cedula es requerido',
            'nombre.required' => 'Nombre es requerido',
            'apellido.required' => 'Apellido es requerido',
            'direccion.required' => 'Direccion es requerido',
            'telefono.required' => 'Telefono es requerido',
            'email.required' => 'Email es requerido',
        ];
    }
}
