<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\MarcaResource;
use App\MoonShine\Resources\PerifericoResource;
use App\MoonShine\Resources\TipoEquipoResource;
use App\MoonShine\Resources\ClienteResource;
use App\MoonShine\Resources\ProveedorResource;
use App\MoonShine\Resources\IngresoEquipoResource;
use App\MoonShine\Resources\SalidaEquipoResource;
//use App\MoonShine\Resources\RoleResource;
//use App\MoonShine\Resources\UserResource;

use Sweet1s\MoonshineRBAC\Resource\PermissionResource;
use Sweet1s\MoonshineRBAC\Resource\RoleResource;
use Sweet1s\MoonshineRBAC\Resource\UserResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                MarcaResource::class,
                PerifericoResource::class,
                TipoEquipoResource::class,
                ClienteResource::class,
                ProveedorResource::class,
                IngresoEquipoResource::class,
                SalidaEquipoResource::class,
                RoleResource::class,
                UserResource::class,
                PermissionResource::class,  // 
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
