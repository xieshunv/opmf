<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>灵析-项目管理系统</title>
    <meta name="description" content="灵析-项目管理系统">
    <meta name="keywords" content="灵析-项目管理系统"/>
    <meta name="author" content="shun.xie">
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
    <script src="{{asset('/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/plugins/ckeditor5/build/ckeditor.js')}}"></script>
    <script src="{{asset('/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/custom/init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/custom/main.css')}}">
</head>
<body>
<!-- Page Container -->
<div id="page-container" class="enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark">
    @include('public.pm.header')
    @include('public/tips')
    @include('public/pm/modal')
    @yield('content')
    @include('public/pm/footer')
</div>
</body>

</html>
