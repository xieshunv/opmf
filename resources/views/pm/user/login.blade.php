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
    <script src="{{asset('/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('/custom/init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/custom/main.css')}}">
</head>
<body>
<div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('/media/photos/login_bk.jpg');">
            <div class="row justify-content-center  bg-primary-dark-op">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        @include('public/tips')
                        <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="font-w700 font-size-h1" href="{{url('/')}}">
                                    <img src="{{url('/media/photos/logo-dark.png')}}">
                                </a>
                                <p class="text-uppercase link-fx font-w700  text-muted">项目管理系统</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <form class="js-validation-signin" action="{{url('/sign')}}" method="POST" id="login">
                                <input type="hidden" name="ref" value="{{$ref}}">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control " id="username" name="username" placeholder="登录名或邮箱" value="xieshun@lingxi360.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control " id="password" name="password" placeholder="密码" value="123456">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  maxlength="4" class="form-control" id="captcha" name="captcha" placeholder="验证码">
                                        <div class="input-group-append">
                                            <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> 登 录
                                    </button>
                                </div>
                            </form>
                            <div class=" text-center font-size-sm">
                                © <span data-toggle="year-copy" class="js-year-copy-enabled">{{date('Y')}}</span> 由 <a class="" href="https://lingxi360.cn" target="_blank">
                                    <img src="{{url('/media/photos/logo-dark.png')}}" style="height: 12px;">
                                </a>提供技术支持
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
