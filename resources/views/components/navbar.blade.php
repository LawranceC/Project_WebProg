<div class="container-fluid navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
    @if (Auth::check())
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
        </ul>
    @else
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/" class="nav-link {{ $page == 'login' ? 'active' : '' }}">Login</a>
            </li>
            <li class="nav-item">
                <a href="/register" class="nav-link {{ $page == 'register' ? 'active' : '' }}">Register</a>
            </li>
        </ul>
    @endif
</div>
