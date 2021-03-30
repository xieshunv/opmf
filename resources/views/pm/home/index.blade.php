<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>登录系统</title>
    <meta name="description" content="项目管理系统">
    <meta name="keywords" content="项目管理系统"/>
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png') }}">
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('plugins/dropzone/dist/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    <!-- Fonts and Styles -->
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

    <script src="{{ mix('js/dashmix.app.js') }}"></script>
    <script src="{{ asset('js/laravel.app.js') }}"></script>

    <!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    <script src="{{asset('/plugins/core/jquery.min.js')}}"></script>
    <script src="{{asset('/js/dashmix.app.js')}}"></script>
    <script src="{{asset('/plugins/dashmix.core.min.js')}}"></script>
    <script src="{{asset('/js/laravel.app.js')}}"></script>

    <script src="{{asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/custom/init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/custom/main.css')}}">
</head>
<body>
<div id="page-container" class="page-header-dark main-content-boxed">

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <a class="font-w600 text-dual tracking-wide" href="index.html">
                    Dash<span class="opacity-75">mix</span>
                    <span class="font-w400">Boxed</span>
                </a>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-dual ml-2" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-search"></i>
                </button>
                <!-- END Open Search Section -->

                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        <i class="fa fa-angle-down ml-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="rounded-top font-w600 text-white bg-image" style="background-image: url('assets/media/photos/photo20.jpg');">
                            <div class="p-3 bg-black-50 rounded-top">
                                <div class="d-flex align-items-center">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar3.jpg" alt="">
                                    <div class="ml-3">
                                        <a class="text-white font-w600" href="be_pages_generic_profile.html">Carol Ray</a>
                                        <div class="font-size-sm text-white-75">c.ray@example.com</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                <div>
                                    <i class="fa fa-fw fa-globe text-black-50 mr-1"></i>
                                    Projects
                                </div>
                                <span class="badge badge-pill badge-primary">3</span>
                            </a>
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                <div>
                                    <i class="fa fa-fw fa-sync-alt text- text-black-50 mr-1"></i>
                                    Servers
                                </div>
                                <span class="badge badge-pill badge-primary">1</span>
                            </a>
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                <div>
                                    <i class="fa fa-fw fa-users text- text-black-50 mr-1"></i>
                                    Customers
                                </div>
                                <span class="badge badge-pill badge-primary">15</span>
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-user-circle text- text-black-50 mr-1"></i>
                                Profile
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                <i class="fab fa-fw fa-paypal text- text-black-50 mr-1"></i>
                                Billing
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-wrench text- text-black-50 mr-1"></i>
                                Preferences
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center mb-0" href="op_auth_signin.html">
                                <i class="fa fa-fw fa-sign-out-alt text-danger mr-1"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-white-90">
            <div class="content-header">
                <form class="w-100" action="bd_search.html" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search your projects.." id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-white-90">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-spinner fa-spin text-primary"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Navigation -->
        <div class="bg-white">
            <div class="content">
                <!-- Toggle Main Navigation -->
                <div class="d-lg-none push">
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                        Menu
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- END Toggle Main Navigation -->

                <!-- Main Navigation -->
                <div id="main-navigation" class="d-none d-lg-block push">
                    <ul class="nav-main nav-main-horizontal nav-main-hover">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_dashboard.html">
                                <i class="nav-main-link-icon fa fa-compass"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Variations</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link active nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                                <span class="nav-main-link-name">Variations</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="bd_simple_1.html">
                                        <span class="nav-main-link-name">Simple 1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="bd_simple_2.html">
                                        <span class="nav-main-link-name">Simple 2</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="bd_image_1.html">
                                        <span class="nav-main-link-name">Image 1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="bd_image_2.html">
                                        <span class="nav-main-link-name">Image 2</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="bd_video_1.html">
                                        <span class="nav-main-link-name">Video 1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="bd_video_2.html">
                                        <span class="nav-main-link-name">Video 2</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <span class="nav-main-link-name">More Options</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <span class="nav-main-link-name">Another Link</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <span class="nav-main-link-name">Another Link</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <span class="nav-main-link-name">Another Link</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="bd_search.html">
                                <i class="nav-main-link-icon fa fa-search"></i>
                                <span class="nav-main-link-name">Search</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_pages_dashboard.html">
                                <i class="nav-main-link-icon fa fa-undo"></i>
                                <span class="nav-main-link-name">Go Back</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Extra</li>
                        <li class="nav-main-item ml-lg-auto">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-brush"></i>
                                <span class="nav-main-link-name d-lg-none">Themes</span>
                            </a>
                            <ul class="nav-main-submenu nav-main-submenu-right">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="default" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-default"></i>
                                        <span class="nav-main-link-name">Default</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xwork"></i>
                                        <span class="nav-main-link-name">xWork</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xmodern"></i>
                                        <span class="nav-main-link-name">xModern</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xeco"></i>
                                        <span class="nav-main-link-name">xEco</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xsmooth"></i>
                                        <span class="nav-main-link-name">xSmooth</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xinspire"></i>
                                        <span class="nav-main-link-name">xInspire</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xdream"></i>
                                        <span class="nav-main-link-name">xDream</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xpro"></i>
                                        <span class="nav-main-link-name">xPro</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                                        <i class="nav-main-link-icon fa fa-circle text-xplay"></i>
                                        <span class="nav-main-link-name">xPlay</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Main Navigation -->
            </div>
        </div>
        <!-- END Navigation -->
        <!-- Page Content -->
        <div class="content">
            <!-- Hero -->
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="py-4 text-center">
                        <h1 class="mb-2">Dashboard</h1>
                        <h2 class="h4 font-w400 text-muted">Welcome to your app, everything looks great!</h2>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Dummy content -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <p class="text-center py-6">...</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Dummy content -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="footer-static bg-white">
        <div class="content py-4">
            <!-- Footer Navigation -->
            <div class="row items-push font-size-sm border-bottom pt-4">
                <div class="col-6 col-md-4">
                    <h3 class="font-w300">Account</h3>
                    <ul class="list list-simple-mini">
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-users text-primary-lighter mr-1"></i> Customers
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fab fa-fw fa-paypal text-primary-lighter mr-1"></i> Billing
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-wrench text-primary-lighter mr-1"></i> Preferences
                            </a>
                        </li>
                        <li>
                            <a class="font-w600 text-dark" href="javascript:void(0)">
                                <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> Carol Ray
                            </a> -
                            <a class="font-w600 text-danger" href="javascript:void(0)">
                                Log out?
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="font-w300">Server</h3>
                    <ul class="list list-simple-mini">
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-database text-primary-lighter mr-1"></i> Databases
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe-americas text-primary-lighter mr-1"></i> Domains
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-envelope text-primary-lighter mr-1"></i> Emails
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-wrench text-primary-lighter mr-1"></i> Management
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-4">
                    <h3 class="font-w300">Projects</h3>
                    <ul class="list list-simple-mini">
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe text-primary-lighter mr-1"></i> example1.com
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe text-primary-lighter mr-1"></i> example2.com
                            </a>
                        </li>
                        <li>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fa fa-fw fa-globe text-primary-lighter mr-1"></i> example2.com
                            </a>
                        </li>
                        <li>
                            <a class="font-w600 text-dark" href="javascript:void(0)">
                                <i class="fa fa-fw fa-plus text-muted mr-1"></i> Add new project
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Footer Navigation -->

            <!-- Footer Copyright -->
            <div class="row font-size-sm pt-4">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 3.1</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
            <!-- END Footer Copyright -->
        </div>
    </footer>
    <!-- END Footer -->
</div>
</body>
</html>
