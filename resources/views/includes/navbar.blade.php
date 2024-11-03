<aside class="shadow app-sidebar bg-body-secondary" data-bs-theme="dark">
    <div class="sidebar-brand">
        @php
            $roleRoutes = [
                'admin' => route('admin.dashboard'),
                'dosen' => route('dosen.dashboard'),
                'mentor' => route('mentor.dashboard'),
                'mahasiswa' => route('mahasiswa.dashboard'),
            ];

            $dashboardRoute = $roleRoutes[Auth::user()->role] ?? '#';
        @endphp
        <a href=" {{ $dashboardRoute }}" class="brand-link">
            <img src="{{ asset('assets') }}/assets/logo-polihasnur.png" alt="AdminLTE Logo"
                class="shadow opacity-75 brand-image">
            <span class="brand-text fw-light">polihasnur X digitalis</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ $dashboardRoute }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-person"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['admin', 'dosen', 'mentor']))
                    <li class="nav-item">
                        <a href="{{ route('bacth.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-palette"></i>
                            <p>Batch</p>
                        </a>
                    </li>
                @endif


                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>
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
