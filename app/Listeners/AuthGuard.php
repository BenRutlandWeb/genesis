<?php

namespace App\Listeners;

use Genesis\Events\Dispatcher;
use Genesis\Http\Request;

class AuthGuard
{
    /**
     * The request object
     *
     * @var \Genesis\Http\Request
     */
    public $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Genesis\Events\Dispatcher $events
     *
     * @return void
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen('init', [$this, 'redirectGuestUsers']);
        $events->listen('init', [$this, 'redirectLoggedInUsers']);
        $events->listen('admin_init', [$this, 'redirectNonAdminUsers']);
        $events->listen('after_setup_theme', [$this, 'removeAdminBar']);
        $events->listen('login_url', [$this, 'loginUrl']);
        $events->listen('register_url', [$this, 'registerUrl']);
    }

    /**
     * Redirect guest users for protected pages
     *
     * @return void
     */
    public function redirectGuestUsers(): void
    {
        if (auth()->guest() && $this->request->isPath('account')) {
            url()->redirect(url()->login());
        }
    }

    /**
     * Redirect logged in users to the account page
     *
     * @return void
     */
    public function redirectLoggedInUsers(): void
    {
        if ($this->request->isMethod('POST') && $this->request->isPath('login')) {
            if ($user = auth()->login($this->request)) {
                url()->redirect($user->isAdmin() ? url()->admin() : 'account');
            }
        }
    }

    /**
     * Redirect non-admin users to the account page
     *
     * @return void
     */
    public function redirectNonAdminUsers(): void
    {
        if (!auth()->user()->isAdmin()) {
            url()->redirect('account');
        }
    }

    /**
     * Remove the admin bar for non-admin users
     *
     * @return void
     */
    public function removeAdminBar(): void
    {
        if (auth()->check() && !auth()->user()->isAdmin()) {
            show_admin_bar(false);
        }
    }

    /**
     * Return the login page URL
     *
     * @return string
     */
    public function loginUrl(): string
    {
        return url('login');
    }

    /**
     * Return the register page URL
     *
     * @return string
     */
    public function registerUrl(): string
    {
        return url('register');
    }
}
