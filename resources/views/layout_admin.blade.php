<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    {{-- URI Header css --}}
    @include('Backend.layout.uri_head')
</head>

<body>
    <!-- Layout wrapper -->

    {{-- Navbar --}}
    @include('Backend.layout.navbar')


    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
        </div>
        <!-- / Content -->

        @include('Backend.layout.footer')

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    {{-- URI Foot JS --}}
    @include('Backend.layout.uri_foot')
</body>

</html>
