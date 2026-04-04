<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/images/favicon.png')}}">
    <title>Nice Admin Template</title>
    <link href="{{asset('backend/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        
        
        @include('backend.layouts.sidebar')
        
        <div class="page-wrapper">
            @yield('content')
            
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by 
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>

    <script src="{{asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/app.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/app.init.js')}}"></script>
    <script src="{{asset('backend/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{asset('backend/dist/js/waves.js')}}"></script>
    <script src="{{asset('backend/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('backend/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <!-- DataTables JS -->
    <script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
</body>

</html>