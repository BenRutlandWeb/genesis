@extends('app')

@section('content')

    @php

    use Genesis\Database\Models\Page;

    $post = Page::find(get_the_ID());

    @endphp

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p class="alignwide">
            <?php printf(__('Posted: %s', '@textdomain'), $post->created_at->diffForHumans()); ?>
        </p>
        {!! $post->content !!}

    </div>

@endsection