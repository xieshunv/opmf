@extends('public.pm.html')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light border-top border-bottom">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <a href="{{url('/form')}}" class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>表单管理
                    </a>
                    <nav class="flex-sm-00-auto ml-sm-3 font-size-sm" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">字段</li>
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
                    <div class="py-0">
                        <div class="row font-size-sm form-inline mb-4">
                            <div class="col-md-6 font-size-h3 font-w600 order-sm-2 mb-1 mb-sm-0 text-sm-left">
                                {{$form['title']}}
                            </div>
                            <div class="col-sm-6  order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                                <a href="{{url("/items/edit?form_id=".$form['id'])}}" class="btn btn-primary font-size-sm" data-toggle="tooltip"  data-original-title="新增字段">
                                    <i class="fa fa-fw fa-plus opacity-50 mr-1"></i>新增
                                </a>
                                <a href="{{url("/form/preview?form_id=".$form['id'])}}" class="btn btn-primary font-size-sm" data-toggle="tooltip"  data-original-title="预览表单">
                                    <i class="fa fa-fw fa-eye opacity-50 mr-1"></i>预览
                                </a>
                            </div>
                        </div>
                        <table class="table table-vcenter js-table-sections font-size-sm table-hover ">
                            <thead class="thead-light">
                            <tr>
                                <th>排序</th>
                                <th >字段</th>
                                <th >显示名称</th>
                                <th >类型</th>
                                <th >必填</th>
                                <th >提示</th>
                                <th>整行显示</th>
                                <th class="text-center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($form['items']))
                                @foreach($form['items'] as $one)
                                <tr>
                                    <td>
                                        <span class="badge badge-primary">{{$one['sequence']}}</span>
                                    </td>
                                    <td>{{$one['data']['key']}}</td>
                                    <td>{{$one['data']['display']}}</td>
                                    <td>{{$one['data']['type']}}</td>
                                    <td>
                                        @if($one['data']['param']['require'])
                                            <span class="badge badge-success">是</span>
                                        @else
                                            <span class="badge badge-danger">否</span>
                                        @endif
                                    </td>
                                    <td>{{$one['data']['param']['placeholder']}}</td>
                                    <td>{{$one['data']['li_class']}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-primary" href="{{url('/items/edit?item_id='.$one['id'])}}" data-toggle="tooltip"  data-original-title="编辑">
                                            <i class="fa fa-fw  fa-edit "></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-primary" href="{{url('/items/delete?item_id='.$one['id'])}}" data-toggle="tooltip"  data-original-title="删除">
                                            <i class="fa fa-fw fa-times "></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->
        </div>
        </div>
        <!-- END Page Content -->
    </main>

@endsection
