<?php echo view('emails.partials.head'); ?>

<?php echo view('emails.partials.header', ['url' => site_url(), 'slot' => get_bloginfo('name')]); ?>

<?php echo view('emails.partials.body-start'); ?>

<!-- Body start -->

<?php echo $slot; ?>

<?php echo view('emails.partials.button', ['url' => site_url('login'), 'color' => 'primary', 'slot' => 'Log in']); ?>

<?php echo view('emails.partials.sub-copy', ['slot' => $subcopy]); ?>

<!-- Body end -->

<?php echo view('emails.partials.body-end'); ?>

<?php echo view('emails.partials.footer', ['slot' => '© ' . date('Y') . ' ' . get_bloginfo('name') . '. ' . __('All rights reserved.')]); ?>

<?php echo view('emails.partials.foot'); ?>