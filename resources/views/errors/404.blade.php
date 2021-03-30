@extends('errors.base')
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/error.png');">
        <div class="hero bg-black-15">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center">
                        <div class="row invisible" data-toggle="appear">
                            <div class="col-sm-6 text-center text-sm-right">
                                <div class="display-1 text-danger font-w700">404</div>
                            </div>
                            <div class="col-sm-6 text-center d-sm-flex align-items-sm-center">
                                <div class="display-1 text-muted font-w300">Error</div>
                            </div>
                        </div>
                        <h1 class="h2 font-w700 text-muted mt-5 mb-3 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">哎呀... 你刚找到一个错误页...</h1>
                        <h4 class="h4 font-w400 text-muted mb-5 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="450">很抱歉，找不到您要查找的页面...</h4>
                        <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                            <a class="btn btn-hero-secondary" href="{{url('/')}}">
                                <i class="fa fa-arrow-left mr-1"></i> 返回首页
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
