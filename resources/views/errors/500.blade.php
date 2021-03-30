@extends('errors.base')
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/error.png');">
        <div class="hero bg-black-15">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center text-sm-right">
                        <div class="display-1 text-black font-w300">500</div>
                        <h1 class="h2 font-w700 text-white mt-5 mb-3">Oops.. You just found an error page..</h1>
                        <h2 class="h3 font-w400 text-white-75 mb-5">We are sorry but your request contains bad syntax and cannot be fulfilled..</h2>
                        <a class="btn btn-hero-secondary" href="{{url('/')}}">
                            <i class="fa fa-arrow-left mr-1"></i> 返回首页
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

