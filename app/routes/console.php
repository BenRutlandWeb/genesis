<?php

use Genesis\Support\Facades\Console;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Console::command('tell a joke', function () {

    $response = wp_remote_get('https://official-joke-api.appspot.com/jokes/random');

    $json = json_decode(wp_remote_retrieve_body($response));

    $this->ask($json->setup);

    $this->line($json->punchline);
});
