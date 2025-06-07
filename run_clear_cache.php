<?php
require __DIR__ . '/../compufix.itcloud.com.co/vendor/autoload.php';
$app = require_once __DIR__ . '/../compufix.itcloud.com.co/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->handle(
    $input = new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'config:clear',
    ]),
    new Symfony\Component\Console\Output\ConsoleOutput
);

$kernel->handle(
    $input = new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'config:cache',
    ]),
    new Symfony\Component\Console\Output\ConsoleOutput
);

$kernel->handle(
    $input = new Symfony\Component\Console\Input\ArrayInput([
        'command' => 'route:clear',
    ]),
    new Symfony\Component\Console\Output\ConsoleOutput
);

echo "Configuración limpiada.";
