<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\MarcaResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\PerifericoResource;
use App\MoonShine\Resources\TipoEquipoResource;
use App\MoonShine\Resources\ClienteResource;
use App\MoonShine\Resources\ProveedorResource;
use App\MoonShine\Resources\IngresoEquipoResource;
use App\MoonShine\Resources\SalidaEquipoResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\UserResource;
use Sweet1s\MoonshineRBAC\Components\MenuRBAC;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return MenuRBAC::menu(
          //  ...parent::menu(),
          MenuGroup::make('System', [
            MenuItem::make('Admins', \Sweet1s\MoonshineRBAC\Resource\UserResource::class, 'users'),
            MenuItem::make('Roles', \Sweet1s\MoonshineRBAC\Resource\RoleResource::class, 'shield-exclamation'),
            MenuItem::make('Permissions', \Sweet1s\MoonshineRBAC\Resource\PermissionResource::class, 'shield-exclamation'),
        ], 'user-group'),
            MenuGroup::make('Maestros', [
                MenuItem::make(trans('Marcas'), MarcaResource::class),
                MenuItem::make('Perifericos', PerifericoResource::class),
                MenuItem::make('Tipo Equipos', TipoEquipoResource::class),
            ],'s.table-cells'),

            MenuGroup::make('Gestion', [
                MenuItem::make('Clientes', ClienteResource::class),
                MenuItem::make('Proveedores', ProveedorResource::class),
                MenuItem::make('Ingreso Equipos', IngresoEquipoResource::class),
                MenuItem::make('Salida Equipos', SalidaEquipoResource::class),
            ],'s.ticket'),

            MenuGroup::make('Reportes', [
                MenuItem::make('Reporte Ingresos', '#', blank: true),
                MenuItem::make('Reporte Egresos', '#', blank: true),
                MenuItem::make('Pago a terceros', '#', blank: true),
            ],'s.window'),
           
            



        );
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
