@extends('errors.base')
@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/photo24@2x.jpg');">
        <div class="hero bg-black-75">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center">
                        <div class="mb-3">
                            <a class="link-fx font-w700 font-size-h3" href="javascript:;">
                                <span class="text-primary">项目管理框架</span>
                            </a>
                        </div>
                        <h3 class="text-white font-w700 mt-5 mb-3">我们正在做一些事情...</h3>
                        <h4 class="h3 text-white-75 font-w400 text-muted mb-5">别担心，我们很快就会回来的！</h4>
                        <div class="mb-3" href="op_status.html">
                            <img src="{{url('/media/photos/logo.png')}}">
                        </div>
                        <br>
                        <div class="btn btn-sm btn-danger">
                            <i class="fa fa-tools mr-1"></i> <span class="">维护模式</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <!-- END Page Content -->
@endsection
