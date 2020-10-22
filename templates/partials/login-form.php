<form action="<?php echo url()->login(); ?>" method="POST">

    <?php csrf_field(); ?>

    <label class="block mb-2">
        Username
        <input type="text" name="user_login" autocomplete="username" required class="border block">
    </label>

    <label class="block mb-2">
        Password
        <input type="password" name="user_password" autocomplete="current-password" required class="border block">
    </label>

    <label class="block mb-2">
        <input type="checkbox" name="remember">
        Keep me logged in
    </label>

    <button type="submit" class="p-2 bg-primary text-white">Login</button>
</form>