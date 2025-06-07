## Acerca de 

Compufix es una aplicacion diseñada para la gestion de talleres de computo y celulares. Contiene los siguientes modulos:

- Gestion de clientes.
- Gestion de proveedores.
- Gestion de tecnicos.
- Gestion de ingreso y salida de equipos.
- Gestion de compras de insumo.
- Gestion de ventas de partes (POS).
- Reportes.

Actualmente nos encontramos en el desarrollo de la aplicacion, por lo que podemos agregar muchas mas funcionalidades.

### Tecnologias

- **[Moonshine](https://moonshine-laravel.com/)**
- **[Moonshine Roles Permissions.](https://github.com/SWEET1S/moonshine-roles-permissions)**
- **[Personalizacion de temas](https://github.com/estivenm0/orion)**

### Scripts Iniciales 

1. Instala las dependencias
    ```sh
    composer install
    ```

2. Genera la clave de la aplicación
    ```sh
    php artisan key:generate
    ```

3. Ejecuta las migraciones
    ```sh
    php artisan migrate
    ```
4. Ejecutar los seeders
    ```sh
    php artisan db:seed
    ```
### Scripts Moonshine Roles Permissions

1. Genera los permisos y crea un rol Super Admin

```sh 
php artisan moonshine-rbac:install
```
2. Creacion de usuarios

```sh 
php artisan moonshine-rbac:user
```
3. Creacion de permisos sobre los recursos

```sh
php artisan moonshine-rbac:permissions UserResource
```
4. Crear recursos y asignar permisos al mismo tiempo
```sh
php artisan moonshine-rbac:resource Post
```

### Desarrolladores
- **[Ivan Dario Narvaez Mejia](https://www.linkedin.com/in/inarvaez1989/)**

### License


