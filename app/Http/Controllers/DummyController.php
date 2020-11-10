<?php

namespace App\Http\Controllers;

use App\Mail\TestAjax;
use Genesis\Http\Request;
use Genesis\Mail\Mailer;
use Illuminate\Routing\Controller;

class DummyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Genesis\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request, Mailer $mailer)
    {
        $mailer->to('benrutland@hotmail.com')->send(new TestAjax());
        return $request;
    }
}
