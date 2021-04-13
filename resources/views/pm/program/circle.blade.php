@extends('public.pm.html')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light border-top border-bottom">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <a href="{{url('/program')}}" class="flex-sm-fill font-size-sm font-w700 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>公益品牌
                    </a>

                    <nav class="flex-sm-00-auto ml-sm-3 font-size-sm" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">项目期</li>
                            <li class="breadcrumb-item active" aria-current="page">设置</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <a href="{{url('/program/add_circle?program_id='.$filter['program_id'])}}" class="ajax-modals font-size-sm btn btn-primary mr-1 mb-3" data-toggle="tooltip" data-original-title="项目期">
                        <i class="fa fa-fw fa-plus opacity-50 mr-1"></i>新增
                    </a>
                    <table class="table table-vcenter js-table-sections font-size-sm table-hover">
                        <thead class="thead-light">
                        <tr class="even">
                            <th class="text-center">#</th>
                            <th class="text-left">项目期</th>
                            <th class="text-left">品牌项目</th>
                            <th class="text-left">项目开始申请时间</th>
                            <th class="text-left">项目结束申请时间</th>
                            <th class="text-left">项目开始时间</th>
                            <th class="text-left">项目结束时间</th>
                            <th class="text-center">启用</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        @if(isset($list))
                            <tbody>
                            @foreach ($list as $k=>$one)
                                <tr class="even">
                                    <td class="text-center">{{$one['id']}}</td>
                                    <td class="text-left">{{$one['name']}}</td>
                                    <td class="text-left">{{data_get($one->program, 'title') , ''}}</td>
                                    <td class="text-left">{{$one['apply_start_time']}}</td>
                                    <td class="text-left">
                                        {{$one['apply_end_time']}}
                                    </td>
                                    <td class="text-left">{{$one['project_start_date']}}</td>
                                    <td class="text-left">{{$one['project_end_date']}}</td>
                                    <td class="text-center">
                                        @if($one['is_enabled'] == 1)
                                            <span class="badge badge-success">是</span>
                                        @else
                                            <span class="badge badge-danger">否</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{url('/program/add_circle?id='.$one['id']."&program_id=".$filter['program_id'])}}" class="ajax-modals btn btn-sm btn-outline-primary" data-toggle="tooltip" data-original-title="编辑">
                                            <i class="fa fa-pencil-alt mr-1"></i>
                                        </a>
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
            <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection