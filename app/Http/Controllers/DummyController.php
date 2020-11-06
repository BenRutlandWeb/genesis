<?php

namespace App\Http\Controllers;

use Genesis\Http\Request;
use Genesis\Routing\Controller;

class DummyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Genesis\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request;
    }
}
