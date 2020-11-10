<?php

namespace App\Http\Controllers;

use App\Mail\CouponRedeemed;
use App\Models\Coupon;
use Genesis\Database\Models\User;
use Genesis\Http\Request;
use Genesis\Support\Facades\Mail;
use Illuminate\Routing\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return Coupon::with('meta')->get();
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
    public function show(Coupon $coupon)
    {
        return $coupon;
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

    public function redeem(Request $request, string $id)
    {
        $user = User::find($request->user);

        $coupon = Coupon::where('post_name', $id)->first();

        Mail::to($user)->send(new CouponRedeemed($coupon));

        return $coupon;
    }
}
