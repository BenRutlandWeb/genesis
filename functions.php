<?php

require __DIR__ . '/vendor/autoload.php';

$app = new Genesis\Foundation\Application(__DIR__);


$app->bootstrap();

load_theme_textdomain('genesis', resource_path('lang'));
