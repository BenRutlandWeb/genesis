<?php

require __DIR__ . '/vendor/autoload.php';

$app = new Genesis\Foundation\Application(__DIR__);

$app->bootstrap();

if (class_exists('WP_CLI')) {
    Console::command('tell a joke', function () {

        $response = wp_remote_get('https://official-joke-api.appspot.com/jokes/programming/random');

        $json = json_decode(wp_remote_retrieve_body($response));

        $this->ask($json->setup);

        $this->line($json->punchline);
    });
}
