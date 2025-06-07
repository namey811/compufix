<?php
// correr-migraciones.php
require __DIR__ . '/../compufix.itcloud.com.co/vendor/autoload.php';
$app = require_once __DIR__ . '/../compufix.itcloud.com.co/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->handle(
    $input = new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'migrate',
        '--force' => true,
    ]),
    new Symfony\Component\Console\Output\ConsoleOutput
);
