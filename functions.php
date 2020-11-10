<?php

require __DIR__ . '/vendor/autoload.php';

$app = new Genesis\Foundation\Application(__DIR__);

$app->make(App\Http\Kernel::class)->bootstrap();
