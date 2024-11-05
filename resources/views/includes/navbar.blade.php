@if (Auth::user()->role === 'admin')
    <aside class="shadow app-sidebar bg-body-secondary" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/image/logo.svg') }}" alt="logo" class="shadow opacity-75 brand-image">
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-person"></i>
                            <p>User</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('bacth.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-palette"></i>
                            <p>Batch</p>
                        </a>
                    </li>


                    <li class="nav-item"> <a href="#" class="nav-link"> <i
                                class="nav-icon bi bi-box-seam-fill"></i>
                            <p>
                                Widgets
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Small Box</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
@endif
