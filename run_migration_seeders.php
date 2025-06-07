<?php
require __DIR__ . '/../compufix.itcloud.com.co/vendor/autoload.php';
$app = require_once __DIR__ . '/../compufix.itcloud.com.co/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$output = new Symfony\Component\Console\Output\ConsoleOutput;

// Ejecutar migraciones
$kernel->handle(
    new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'migrate',
        '--force' => true,
    ]),
    $output
);

// Ejecutar seeders
$kernel->handle(
    new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'db:seed',
        '--force' => true,
    ]),
    $output
);
