<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js" dir="ltr">

<head>
    @include('admin.layout.header')

    @yield('page_styles')

    <livewire:styles />

</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">


        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')

        <div class="page-wrapper">
            @include('admin.layout.message')
            @yield('main_content')

            @include('admin.layout.footer')

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatable/jquery.dataTables.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admin/libs/popper/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="{{asset('admin/js/app-style-switcher.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/js/custom.js')}}"></script>

    @yield('page_scripts')
    <livewire:scripts />

</body>

</html>