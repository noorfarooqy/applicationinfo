<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Web application information management ">
    <meta name="author" content="Drongo Technology Limited">
    <meta name="keywords"
        content="Web application information management ">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/appinfo/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title> @yield('title') - {{env('APP_NAME')}} </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/appinfo/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="/appinfo/assets/css/style.css" rel="stylesheet" />
    <link href="/appinfo/assets/css/dark-style.css" rel="stylesheet" />
    <link href="/appinfo/assets/css/transparent-style.css" rel="stylesheet">
    <link href="/appinfo/assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="/appinfo/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/appinfo/assets/colors/color1.css" />
    @yield('styles')
    

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/appinfo/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('appinfo::appinfo.app-header')

            @include('appinfo::appinfo.app-sidebar')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                @yield('content')
            </div>
            <!--app-content close-->

        </div>


        @include('appinfo::appinfo.country-modal')

       @include('appinfo::appinfo.footer')

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="/appinfo/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/appinfo/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/appinfo/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="/appinfo/assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="/appinfo/assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="/appinfo/assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="/appinfo/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="/appinfo/assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="/appinfo/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/appinfo/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="/appinfo/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="/appinfo/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="/appinfo/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="/appinfo/assets/plugins/chart/rounded-barchart.js"></script>
    <script src="/appinfo/assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="/appinfo/assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="/appinfo/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/appinfo/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="/appinfo/assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="/appinfo/assets/js/apexcharts.js"></script>
    <script src="/appinfo/assets/plugins/apexchart/irregular-data-series.js"></script>



    <!-- SIDE-MENU JS-->
    <script src="/appinfo/assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="/appinfo/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="/appinfo/assets/js/typehead.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="/appinfo/assets/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="/appinfo/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/appinfo/assets/js/custom.js"></script>

    <!-- SWEET-ALERT JS -->
    <script src="/appinfo/assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="/appinfo/assets/js/sweet-alert.js"></script>
    @yield('scripts')


</body>

</html>