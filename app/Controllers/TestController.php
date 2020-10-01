<?php

namespace App\Controllers;

use Genesis\Http\Request;
use Genesis\Routing\Controller;
use Genesis\Database\Models\Post;

class TestController extends Controller
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
        return Post::find($request->id);
    }
}
