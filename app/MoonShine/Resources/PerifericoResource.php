<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Periferico;
use App\MoonShine\Pages\Periferico\PerifericoIndexPage;
use App\MoonShine\Pages\Periferico\PerifericoFormPage;
use App\MoonShine\Pages\Periferico\PerifericoDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

/**
 * @extends ModelResource<Periferico, PerifericoIndexPage, PerifericoFormPage, PerifericoDetailPage>
 */
class PerifericoResource extends ModelResource
{
    use WithRolePermissions;
    
    protected string $model = Periferico::class;

    protected string $title = 'Perifericos';

    protected bool $createInModal = true;
 
    protected bool $editInModal = true;
 
    protected bool $detailInModal = true;
    
    /**
     * @return list<Page>
     */

    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Nombre','nombre')->sortable(),
            Text::make('Descripcion', 'descripcion')->sortable(),
            Date::make('Fecha Creacion', 'created_at')->sortable(),
            Date::make('Fecha Actualizacion', 'updated_at')->sortable()
        ];
    }

    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Nombre','nombre')->required(),
                Text::make('Descripcion', 'descripcion')->required(),
            ]),
        ];
    }

    protected function detailFields(): iterable
    {
        return [
            Text::make('Nombre','nombre'),
            Text::make('Descripcion', 'descripcion'),
            Date::make('Fecha Creacion', 'created_at'),
            Date::make('Fecha Actualizacion', 'updated_at')
        ];
    }

    protected function search(): array
    {
        return ['id', 'nombre', 'descripcion'];
    }

    /**
     * @param Periferico $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'nombre' => ['required', 'string', 'min:5'],
            'descripcion' => ['required', 'string', 'min:5']
        ];
    }

    public function validationMessages(): array
    {
        return [
            'nombre.required' => 'Nombre es requerido',
            'descripcion.required' => 'Descripcion es requerido'
        ];
    }
}
