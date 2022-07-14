<!DOCTYPE html>
<html>

<head>
    {{-- URI Header css --}}
    @include('layout.source.head')
</head>


<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->
        <!-- Preloader -->

        @include('layout.header')

        @yield('content')

        <!--footer-main-->
        @include('layout.footer')
        <!--End footer-main-->

    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    {{-- URI Header css --}}
    @include('layout.source.foot')
</body>

</html>
