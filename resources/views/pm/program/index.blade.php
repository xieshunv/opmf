@extends('public.pm.html')
@section('content')
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row  align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>公益品牌
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">

                        <ol class="breadcrumb font-size-sm">
                            <!--
                           <li class="breadcrumb-item">Layout</li>
                            -->
                           <li class="breadcrumb-item">项目品牌</li>
                           <li class="breadcrumb-item active" aria-current="page">列表</li>
                       </ol>

                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <a href="{{url('/program/edit')}}" class="btn btn-primary font-size-sm  mr-1 mb-3" data-toggle="tooltip" data-original-title="新增品牌">
                        <i class="fa fa-fw fa-plus opacity-50 mr-1"></i>公益品牌
                    </a>

                    <table class="table table-vcenter js-table-sections font-size-sm table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">项目名称</th>
                                <th class="text-left" style="width: 55%;">项目短描述</th>
                                <th class="text-center">初始态</th>
                                <th class="text-left" style="width: 7%;">操作</th>
                            </tr>
                        </thead>
                        @if(isset($list))
                            <tbody>
                            @foreach ($list as $k=>$one)
                                <tr class="even">
                                    <td class="text-left">{{$one['id']}}</td>
                                    <td class="text-left">{{$one['title']}}</td>
                                    <td class="">{{strip_tags($one['short_description'])}} </td>
                                    <td class="text-center">{{$one['init_status_id']}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm pr-2">
                                            <a href="{{url('/program/edit?id='.$one['id'])}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="编辑">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </a>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" id="btnGroupTabs1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    更多..
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="btnGroupTabs1" style="">
                                                    <a class="dropdown-item" href="{{url('/program/status?program_id='.$one['id'])}}"  data-toggle="tooltip" title="" data-original-title="状态">
                                                        <i class="fab fa-instalod mr-2"></i>状态设置
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{url('/form?program_id='.$one['id'])}}"  data-toggle="tooltip" title="" data-original-title="表单">
                                                        <i class="fa fa-file-alt mr-2"></i>表单管理
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{url('/circle?program_id='.$one['id'])}}"  data-toggle="tooltip" data-original-title="项目期">
                                                        <i class="fa fa-calendar-check mr-2"></i>项目期
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    <nav aria-label="Page navigation">
                        @if(isset($list))
                            {{$list->appends($filter)->links('paging.pagination')}}
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection


