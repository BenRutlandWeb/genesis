@extends('layout.app')

@section('content')

    <div class="container">

        <x-alert type="error" message="This error message will self-destruct"></x-alert>

        @loop('partials.content')
    </div>

@endsection