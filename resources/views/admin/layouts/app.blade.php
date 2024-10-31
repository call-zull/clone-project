<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    @include('admin.includes.meta')
    @include('admin.includes.styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper"> <!--begin::Header-->
        @include('admin.includes.header')

        @include('admin.includes.navbar')
        <main class="app-main">

            {{ $slot }}
        </main>
        @include('admin.includes.script')
    </div>
</body>

</html>
