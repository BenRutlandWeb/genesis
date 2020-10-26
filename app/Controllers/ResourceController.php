<?php

namespace App\Controllers;

use Genesis\Http\Request;
use Genesis\Routing\Controller;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        # code...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Genesis\Http\Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        # code...
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function show(int $id)
    {
        return \Genesis\Database\Models\User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function edit(int $id)
    {
        # code...
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Genesis\Http\Request $request
     * @param integer               $id
     *
     * @return mixed
     */
    public function update(Request $request, int $id)
    {
        # code...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function destroy(int $id)
    {
        # code...
    }
}
