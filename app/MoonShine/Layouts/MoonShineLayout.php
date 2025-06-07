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
          MenuGroup::make('Sistema', [
            MenuItem::make('Usuarios', \Sweet1s\MoonshineRBAC\Resource\UserResource::class, 'users'),
            MenuItem::make('Roles', \Sweet1s\MoonshineRBAC\Resource\RoleResource::class, 's.shield-check'),
            MenuItem::make('Permisos', \Sweet1s\MoonshineRBAC\Resource\PermissionResource::class, 'shield-exclamation'),
        ], 's.cog'),
            MenuGroup::make('Maestros', [
                MenuItem::make('Marcas', MarcaResource::class,'s.bar3'),
                MenuItem::make('Perifericos', PerifericoResource::class,'s.cog'),
                MenuItem::make('Tipo Equipos', TipoEquipoResource::class,'s.computer-desktop'),
            ],'s.table-cells'),

            MenuGroup::make('Gestion', [
                MenuItem::make('Clientes', ClienteResource::class,'s.user'),
                MenuItem::make('Proveedores', ProveedorResource::class,'s.wallet'),
                MenuItem::make('Ingreso Equipos', IngresoEquipoResource::class,'s.wrench-screwdriver'),
                MenuItem::make('Salida Equipos', SalidaEquipoResource::class,'s.tag'),
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
