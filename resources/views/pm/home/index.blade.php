@extends('public.pm.html')
@section('content')
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
@endsection


