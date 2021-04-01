@extends('errors.base')
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/error.png');">
        <div class="hero  align-items-sm-start bg-black-15">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center text-sm-left">
                        <div class="display-1 text-warning font-w700 invisible" data-toggle="appear">419</div>
                        <h1 class="h2 font-w700 text-white mt-5 mb-3 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">Oops.. Page Expired..</h1>
                        <h2 class="h3 font-w400 text-white-75 mb-5 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="450">Please try again later..</h2>
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
