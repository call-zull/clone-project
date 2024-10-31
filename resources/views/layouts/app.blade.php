<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
    @include('includes.styles')
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
</body>

</html>
