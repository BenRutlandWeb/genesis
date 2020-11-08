<!DOCTYPE html>
<html {{ language_attributes() }}>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{ wp_head() }}
</head>

<body {{ body_class('flex flex-col min-h-screen') }}>

    {{ wp_body_open() }}

    {{ view('partials.header') }}

    <main class='flex-1'>

        @yield('content')

    </main>

    {{ view('partials.footer') }}
    {{ wp_footer() }}

</body>

</html>