<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Drongo Technology Limited - Providing suitable solutions">
    <meta name="author" content="Drongo Technology Limited">
    <meta name="keywords" content="Drongo Technology Limited - Providing suitable solutions">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/appinfo/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Login - {{env('APP_NAME')}}</title>

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

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="/appinfo/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="/appinfo/assets/images/brand/logo-white.png" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <div class="login100-form validate-form">
                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active"
                                                    data-bs-toggle="tab">Email</a></li>
                                            <li class="mx-0"><a href="#tab6" data-bs-toggle="tab">Mobile</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div  class="tab-pane active" id="tab5">
                                            <form action="/login" method="post">
                                                @csrf
                                                <div class="wrap-input100 validate-input input-group"
                                                    data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)"
                                                        class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0"
                                                        name="email" type="email" placeholder="Email">
                                                </div>
                                                <div class="wrap-input100 validate-input input-group"
                                                    id="Password-toggle">
                                                    <a href="javascript:void(0)"
                                                        class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0"
                                                        type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="text-end pt-4">
                                                    <p class="mb-0"><a href="/forgot" class="text-primary ms-1">Forgot
                                                            Password?</a></p>
                                                </div>
                                                <div class="container-login100-form-btn">
                                                    <input type="submit" value="Login"
                                                        class="login100-form-btn btn-primary">
                                                </div>
                                            </form>
                                            </d>
                                            <div class="tab-pane" id="tab6">
                                                Comming soon
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="/appinfo/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/appinfo/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/appinfo/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="/appinfo/assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="/appinfo/assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/appinfo/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="/appinfo/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/appinfo/assets/js/custom.js"></script>

</body>

</html>