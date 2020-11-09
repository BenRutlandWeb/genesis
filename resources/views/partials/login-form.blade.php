<form action="{{ url()->login() }}" method="POST">

    @csrf

    <label class="block mb-2">
        {{ __('Username') }}
        <input type="text" name="user_login" autocomplete="username" required class="border block">
    </label>

    <label class="block mb-2">
        {{ __('Password') }}
        <input type="password" name="user_password" autocomplete="current-password" required class="border block">
    </label>

    <label class="block mb-2">
        <input type="checkbox" name="remember">
        {{ __('Keep me logged in') }}
    </label>

    <button type="submit" class="p-2 bg-primary text-white">
        {{ __('Login') }}
    </button>
</form>