<?php

namespace App\Console\Commands;

use Genesis\Console\Command;

class SortingHat extends Command
{
    /**
     * The command signature.
     *
     * @var string
     */
    protected $signature = 'sortinghat';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Get sorted into a Hogwarts house';

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $houses = ['Gryffindor', 'Hufflepuff', 'Ravenclaw', 'Slytherin'];
        $i = array_rand($houses);
        $this->success($houses[$i]);
    }
}
