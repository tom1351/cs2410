<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-primary mb-0 {{ view_navbar_classes(Route::getCurrentRoute()->getName()) }}">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/">
                    Aston Events
                </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/">Events</a>
                </li>
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-header">Account</a>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="btn btn-neutral btn-round">
                            <i class="now-ui-icons users_single-02"></i> Login
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->