<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Tata ruang laut</title>

    <link rel="shortcut icon" href="{{ asset('admin/images/logo/favicon.png') }}">
    <link href="{{ asset('admin/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet">


</head>

<body>
    <div class="app">
        <div class="layout">

            <!-- Header START -->
            @include('includes.admin.navbar')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('includes.admin.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">


                <!-- Content Wrapper START -->
                @yield('content')
                <!-- Content Wrapper END -->

            </div>
        </div>
    </div>

{{--
    <!-- Core Vendors JS -->

    <script src="{{ asset('admin/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('admin/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/dashboard-default.js') }}"></script> --}}


    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    @stack('add-script')

</body>


<!-- Mirrored from www.themenate.net/enlink-bs/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Dec 2022 07:08:06 GMT -->
</html>
