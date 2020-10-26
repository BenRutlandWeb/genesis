<?php

namespace App\Controllers;

use Genesis\Http\Request;
use Genesis\Routing\Controller;

class ApiController extends Controller
{
    /**
     * handle the ajax call
     *
     * @param \Genesis\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $request->message = 'Welcome to enjoyable development!';
        $request->hello = 'world!';

        return $request;
    }
}
