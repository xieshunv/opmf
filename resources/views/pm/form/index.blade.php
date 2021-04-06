@extends('public.pm.html')
@section('content')
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row  align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>表单管理
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3 font-size-sm" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">表单</li>
                            <!--
                            <li class="breadcrumb-item">Sidebar</li>
                             -->
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
                <div class="block-content text-center">
                    <div class="py-0">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                                <form class="form-inline mb-4" action="{{url("form")}}" method="GET">
                                    <label class="sr-only" for="title"></label>
                                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="title" value="{{isset($filter['title'])?$filter['title']:''}}" name="title" placeholder="表单名称">
                                    <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-fw fa-search" data-toggle="tooltip" data-original-title="Search"></i></button>
                                    <a href="{{url("form")}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Reset">
                                        <i class="fa fa-fw fa-undo"></i>
                                    </a>
                                </form>
                            </div>
                            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                                <a href="{{url("form/edit")}}" class="btn btn-sm  btn-primary">
                                    <i class="fa fa-fw fa-plus opacity-50 mr-1"></i>新增表单
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-vcenter js-table-sections font-size-sm table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">表单名称</th>
                                <th class="text-center">项目期</th>
                                <th class="text-left">模块</th>
                                <th class="text-left" style="width: 55%;">展示字段</th>
                                <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        @if($list)
                            @foreach($list as $one)
                                @if ($one['form_blocks'])
                                    <tbody class="js-table-sections-header">
                                @else
                                    <tbody>
                                 @endif
                                <tr>
                                    <td class="text-center" scope="row">
                                        {{$one['id']}}
                                        @if ($one['form_blocks'])
                                            <i class="fa fa-angle-right text-muted"></i>
                                        @endif
                                    </td>
                                    <td class="text-left" scope="row">
                                        <a href="{{url('/form/edit?form_id='.$one['id'])}}" data-toggle="tooltip"  data-original-title="Edit">{{$one['title']}}</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-info">{{$one['stage']['name']??0}}</span>
                                    </td>
                                    <td class="text-left">
                                        <span class="badge badge-danger">{{$one['module']}}</span>
                                    </td>
                                    <td class="text-left">
                                        @if (is_array($one['list_views']))
                                            @foreach ($one['list_views'] as $key=>$item)
                                                {{$key}}:{{implode(',',$item)}}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (empty($one['form_blocks']))
                                           <a href="{{url('/items?form_id='.$one['id'])}}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip"  data-original-title="添加/编辑 字段">
                                               <i class="fa  fa-edit"></i>
                                            </a>
                                       @endif
                                    </td>
                                </tr>
                                @if (!empty($one['form_blocks']))
                                    <tbody class="font-size-sm">
                                    @foreach ($one['form_blocks'] as $key=>$sub)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td class="text-left" scope="row">
                                                <a href="{{url('/form/edit?form_id='.$sub['id'])}}" data-toggle="tooltip"  data-original-title="Edit">{{$sub['title']}}</a>
                                            </td>
                                            <td class="text-left">
                                                <span class="badge badge-info"></span>
                                            </td>
                                            <td class="text-left">
                                                <span class="badge badge-danger">{{$sub['module']}}</span>
                                            </td>
                                            <td class="text-left">
                                                @if (is_array($sub['list_views']))
                                                    @foreach ($sub['list_views'] as $key=>$item)
                                                        {{$key}}:{{implode(',',$item)}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{url('/items?form_id='.$sub['id'])}}" class="btn btn-sm btn-alt-primary" data-toggle="tooltip"  data-original-title="添加/编辑 字段">
                                                    <i class="fa  fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    @endif
                                    @endforeach
                                @endif
                        </tbody>
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


