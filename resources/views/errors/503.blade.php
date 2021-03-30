@extends('errors.base')
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/error.png');">
        <div class="hero bg-white-15 align-items-sm-start">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center text-sm-right">
                        <div class="display-1 text-muted font-w700">503</div>
                        <h1 class="h2 font-w700 text-muted  mt-5 mb-3">Oops.. You just found an error page..</h1>
                        <h2 class="h3 font-w400 text-muted mb-5">We are sorry but our service is currently not available..</h2>
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


