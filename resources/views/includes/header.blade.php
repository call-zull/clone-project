<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        @if (Auth::user()->role === 'admin')
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i> </a> </li>
            </ul>
        @else
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a href="/" class="navbar-brand">
                        <img src="{{ asset('assets/image/logo.svg') }}" alt="Logo" style="height: 40px;">
                    </a>
                </li>

                <li class="nav-item d-none d-md-block ms-3">
                    <form action="" method="get" class="d-flex">
                        <input type="text" name="search" id="" placeholder="Search..."
                            class="form-control me-2" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" aria-label="Search">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </li>
            </ul>
        @endif

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle Fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                        class="shadow user-image rounded-circle" alt="User Image" style="height: 35px;">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                            class="shadow rounded-circle" alt="User Image">
                        <p>{{ Auth::user()->name }}</p>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
