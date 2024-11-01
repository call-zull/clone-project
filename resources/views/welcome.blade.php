@if (Auth::check())
    <script>
        @php
            $roleRoutes = [
                'admin' => route('admin.dashboard'),
                'dosen' => route('dosen.dashboard'),
                'mentor' => route('mentor.dashboard'),
                'mahasiswa' => route('mahasiswa.dashboard'),
            ];
            $dashboardRoute = $roleRoutes[Auth::user()->role] ?? route('default.dashboard');
        @endphp

        window.location.href = "{{ $dashboardRoute }}";
    </script>
@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
