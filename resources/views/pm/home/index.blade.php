<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>灵析项目管理系统</title>
    <meta name="description" content="灵析项目管理系统">
    <meta name="keywords" content="灵析项目管理系统"/>
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
    <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('/custom/init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/custom/main.css')}}">
</head>
<body>
<div id="page-container" class="page-header-fixed main-content-narrow side-trans-enabled page-header-dark"><div id="page-overlay"></div>
    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <div id="horizontal-navigation-hover-normal-dark" class="d-none d-lg-block mt-2 mt-lg-0">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-dark">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/')}}">
                            <img src="{{url('/media/photos/logo.png')}}" style="height:22px;">
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link"   href="{{url('/')}}">
                            <i class="nav-main-link-icon fa fa-home"></i>
                            <span class="nav-main-link-name">首页</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-boxes"></i>
                            <span class="nav-main-link-name">项目管理</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">篮球季</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">星空计划</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">组织机构</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon fa fa-globe"></i>
                            <span class="nav-main-link-name">项目动态</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="javascript:void(0)">
                            <i class="nav-main-link-icon fa fa-money-bill"></i>
                            <span class="nav-main-link-name">素材管理</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon far fa-chart-bar"></i>
                            <span class="nav-main-link-name">统计分析</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">篮球季统计</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">星空计划统计</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-wrench"></i>
                            <span class="nav-main-link-name">系统设置</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">基础设置</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">公益品牌</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">表单管理</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">项目期管理</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">评分设置</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-lock"></i>
                            <span class="nav-main-link-name">权限管理</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">角色管理</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">权限设置</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="#">
                                    <span class="nav-main-link-name">管理员</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block ">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-main-link-icon fa fa-user"></i>
                        <span class="d-none d-sm-inline-block">Admin</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-2 font-size-sm">
                            <a class="dropdown-item" href="be_pages_generic_profile.html">
                                <i class="far fa-fw fa-user mr-1"></i> 个人信息
                            </a>
                            <div role="separator" class="dropdown-divider"></div>

                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="far fa-fw fa-building mr-1"></i> 基础设置
                            </a>
                            <!-- END Side Overlay -->

                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="op_auth_signin.html">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> 退出系统
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
        <div id="page-header-search" class="overlay-header bg-header-dark">
            <div class="bg-white-10">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-header-dark">
            <div class="bg-white-10">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->
    <!-- Main Container -->
    @include('public/tips')
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row  align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>首页
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <!--
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Layout</li>
                            <li class="breadcrumb-item">Sidebar</li>
                            <li class="breadcrumb-item active" aria-current="page">Mini</li>
                        </ol>
                        -->
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-content text-center">
                    <p>
                        You can have a mini Sidebar.
                    </p>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0 text-center font-size-sm page-footer-fixedz">
            &copy; <span data-toggle="year-copy"></span> 由 <a class="font-w600" href="https://lingxi360.cn" target="_blank">
                <img src="https://www.lingxi360.com/Application/Home/View/lx/styles/css/images/logo-dark.png" style="height: 12px;">
            </a>提供技术支持
        </div>
    </footer>
    <!-- END Footer -->
</div>
</body>
</html>
