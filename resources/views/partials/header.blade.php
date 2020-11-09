<header class="header container">
    <div class="flex justify-between alignwide">
        <a href="{{ url()->home() }}" class="font-bold">
            {{ get_bloginfo('name') }}
        </a>

        <nav>
            <ul>

                @auth
                    @if(auth()->user()->isAdmin())
                        <li>
                            <a href="{{ url()->admin() }}" class="button">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('account') }}" class="button">
                                {{ __('Account') }}
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{!! url()->logout() !!}" class="button">
                            {{ __('Log out') }}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url()->login('account') }}" class="button">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url()->register('account') }}" class="button">
                            {{ __('Register') }}
                        </a>
                    </li>
                @endif

            </ul>
            <button type="button" id="prefers-color-scheme">Light/Dark</button>

        </nav>
    </div>
</header>