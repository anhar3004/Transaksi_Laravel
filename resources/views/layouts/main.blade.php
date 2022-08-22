<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('plugin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('plugin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('plugin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('plugin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <!-- CSS only -->


    <!-- Vendor CSS-->
    <link href="{{ asset('plugin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('plugin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- CSS Bootstrap Datepicker -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Main CSS-->
    <link href="{{ asset('plugin/css/theme.css') }}" rel="stylesheet" media="all">

    <!-- Toastr CSS-->
    <link href="{{ asset('plugin/vendor/toastr/css/toastr.min.css') }}" rel="stylesheet">

    <!-- Data Tables CSS-->
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" media="all">
    <link href="//cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


</head>

<body class="animsition">
    <div class="page-wrapper">
        @yield('sidebar')
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            @yield('header')
            @yield('content')
            <!-- END PAGE CONTAINER-->
            {{-- <footer>
                    <div class="card text-center">
                        <div class="col-lg-12 card-header ">
                            <div class="copyright">
                                <h6 class="title-1">Copyright ©<strong> Anhar Hadhitya 18111184 TIF RM 18 CIDA </strong> </h6>

                            </div>
                        </div>
                    </div>
                </footer> --}}
        </div>
    </div>


    <!-- Bootstrap JS-->
    <script src="{{ asset('plugin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    =
    <!-- Vendor JS       -->
    <script src="{{ asset('plugin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('plugin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugin/vendor/toastr/js/toastr.init.js') }}"></script>
    <script src="{{ asset('plugin/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- Javascript Bootstrap Datepicker -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Main JS-->
    <script src="{{ asset('plugin/js/main.js') }}"></script>



</body>

</html>
