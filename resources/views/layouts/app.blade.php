<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.meta')
    @include('includes.styles')
        <!-- Memuat jQuery sebelum Select2 -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Memuat Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Memuat Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @auth
            @include('includes.header')

            @include('includes.navbar')
        @endauth
        <main class="app-main">
            {{ $slot }}
        </main>
        @include('includes.script')
    </div>

    @stack('scripts')
</body>

</html>
