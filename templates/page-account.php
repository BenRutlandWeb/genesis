<?php echo view('partials.head'); ?>

<div class="container">
    <h1><?php echo auth()->user()->name; ?></h1>
    <h2><?php echo auth()->user()->roles[0]; ?></h2>
</div>

<?php echo view('partials.foot'); ?>