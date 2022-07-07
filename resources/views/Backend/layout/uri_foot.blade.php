
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('backend/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('backend/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('backend/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    {{--  DATATABLE  --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

    <script src="{{ asset('backend/datatable/jquery.js')}}"></script>
    <script src="{{ asset('backend/datatable/jquery_datatable.min.js')}}"></script>
    <script src="{{ asset('backend/datatable/datatable_bootstrap.min.js')}}"></script>

    {{--  CkEditor  --}}
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
    var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    </script>


