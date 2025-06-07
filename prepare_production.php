<?php

echo "🔐 Generando clave de aplicación...\n";

require __DIR__ . '/../compufix.itcloud.com.co/vendor/autoload.php';
$app = require_once __DIR__ . '/../compufix.itcloud.com.co/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$output = new Symfony\Component\Console\Output\ConsoleOutput;

// Generar APP_KEY
$kernel->handle(
    new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'key:generate',
        '--force' => true,
    ]),
    $output
);

// Instalar dependencias de producción
echo "📦 Instalando dependencias (modo producción)...\n";
$composerOutput = shell_exec('cd ' . __DIR__ . '/../compufix.itcloud.com.co && composer install --no-dev --optimize-autoloader');

echo $composerOutput ?: "✅ Dependencias instaladas correctamente.\n";

echo "🎉 Preparación completada.\n";
