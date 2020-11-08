@extends('emails.layout')


@section('body')

A {{ $coupon->title }} coupon has been redeemed.

@endsection

@section('footer')

© {{ date('Y') }} {{ get_bloginfo('name') }}. {{ __('All rights reserved.') }}

@endsection