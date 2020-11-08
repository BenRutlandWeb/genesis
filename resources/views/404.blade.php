@extends('app')

@section('content')

<div class="container">
    <div class="prose mx-auto my-16">

        <h1>{{ __('404: Page not found', '@textdomain') }}</h1>

        <p>{{ __('Awwww shucks', '@textdomain') }}</p>

        <p>
            <a href="{{ url()->home() }}">
                {{ __('Go back home', '@textdomain') }}
            </a>
        </p>

    </div>
</div>

@endsection