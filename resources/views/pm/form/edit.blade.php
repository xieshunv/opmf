@extends('public.pm.html')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row  align-items-sm-center">
                    <a href="{{url('/form')}}" class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>表单管理
                    </a>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">新增</li>
                            <!--
                            <li class="breadcrumb-item">Sidebar</li>
                             -->
                            <li class="breadcrumb-item active" aria-current="page">编辑</li>
                        </ol>

                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 font-size-h3 font-w600 pb-4 mb-4 text-center border-bottom">

                            @if(!empty($form['title']))
                                {{$form['title']}}
                            @else
                                新增一个表单
                            @endif
                        </div>
                        <div class="col-md-12 col-lg-8 font-size-sm">
                            <form  action="{{url("/form/save")}}" method="POST" id="add_form">
                                <input type="hidden" name="id" value="{{isset($form['id'])?$form['id']:0}}">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="title">标题<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required"  id="title" name="title" value="{{isset($form['title'])?$form['title']:''}}" maxlength="30" data-always-show="true" data-placement="top">
                                        <small class="form-text text-muted">
                                            表单名称,30字符内
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="enable_apply_fill">是否申请方填写</label>
                                        <select class="custom-select" id="enable_apply_fill" name="enable_apply_fill">
                                            <option value="1" @if(isset($form['enable_apply_fill']) && $form['enable_apply_fill'] =='1') selected=true @endif>是</option>
                                            <option value="0" @if(isset($form['enable_apply_fill']) && ($form['enable_apply_fill'] =='0')) selected=true @endif>否</option>
                                        </select>
                                        <small class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="module">form类型或别名<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" id="module" name="module" value="{{isset($form['module'])?$form['module']:''}}">
                                        <small class="form-text text-muted">
                                            program/status
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_multi">是否可以填写多份</label>
                                        <select class="custom-select" id="is_multi" name="is_multi">
                                            <option value="0" @if(isset($form['is_multi']) && $form['is_multi'] =='0') selected=true @endif>否</option>
                                            <option value="1" @if(isset($form['is_multi']) && ($form['is_multi'] =='1')) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted">
                                        </small>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="module_id">类型ID</label>
                                        <select class="custom-select" id="module_id" name="module_id">
                                            <option value="0" >请选择</option>
                                            @if(!empty($program_info))
                                                @foreach($program_info as $item)
                                                    <option value="{{$item['id']}}" @if(isset($form['module_id']) && $form['module_id'] ==$item['id']) selected=true @endif>{{$item['short_title']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="form-text text-muted">表单有隶属关系时填写
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="program_circle_id">项目期</label>
                                        <input type="text" class="form-control"  id="program_circle_id" name="program_circle_id" value="{{isset($form['program_circle_id'])?$form['program_circle_id']:0}}" >
                                        <small class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="parent_id">主表单</label>
                                        <select class="custom-select" id="parent_id" name="parent_id">
                                            <option value="0" >请选择</option>
                                            @if(!empty($master_form_select))
                                                @foreach($master_form_select as $item)
                                                    <option value="{{$item['id']}}" @if(isset($form['parent_id']) && $form['parent_id'] ==$item['id']) selected=true @endif>{{$item['title']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="form-text text-muted">表单有隶属关系时填写
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sequence">排序</label>
                                        <input type="text" class="form-control"  id="sequence" name="sequence" value="{{isset($form['sequence'])?$form['sequence']:0}}" >
                                        <small class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label>描述</label>
                                        <textarea id="js-ckeditor" name="description">{{isset($form['description'])?$form['description']:''}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row list_views_div">
                                    <!-- list_views  -->
                                    <small class="col-md-12  rowform-text"><span class="font-w600 text-danger">列表展示字段:</span>不同状态可以配置不同的字段,id=0表示默认。fields半角逗号分割(name,email)</small>
                                    @if (!empty($form['list_views']))
                                        @foreach($form['list_views'] as $k=>$v)
                                            <div class="col-md-12 form-inline" id="{{$k}}" style="margin-top: 5px;">
                                                <input type="text" value="{{$k}}" class="form-control mr-sm-2 mb-sm-0 col-2" name="list_views_group_id[]" placeholder="id">
                                                <input type="text" value="{{implode(',',$v)}}"class="form-control mr-sm-2 mb-sm-0 col-9" name="list_views_group_fields[]" placeholder="fields">
                                                <a href="javascript:;" onclick="del_list_views({{$k}})">
                                                    <i class="fa fa-times fa-fw" style="color: red;"></i>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="col-md-12 form-inline" style="margin-top: 5px;">
                                        <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="list_views_group_id[]" placeholder="status">
                                        <input type="text" class="form-control mr-sm-2 mb-sm-0 col-9" name="list_views_group_fields[]" placeholder="fields">
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12" >
                                        <a href="javascript:;" class="btn btn-sm btn-primary add_list_views">
                                            <i class="fa fa-fw fa-plus mr-1"></i> 增加新记录
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label for="extra_pm_html">extra_pm_html</label>
                                    <textarea class="form-control"  id="extra_pm_html" name="extra_pm_html" rows="4">{{isset($form['extra_pm_html'])?$form['extra_pm_html']:''}}</textarea>
                                    <small class="form-text text-muted">此html代码将显示在pm端[详情页]的上方</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit"  style="width: 100%"  class="btn btn-lg btn-primary"><i class="far fa-save mr-2"></i>保 存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
<script>
    $(function(){
        //表单验证
        $("#add_form").validate();

        //项目期
        $("#module_id").change(function(){
            var  program_id = $(this).val();
            if (program_id > 0) {
                $.get('/form/circle_id?program_id='+program_id,function (ret) {
                    var circle_id =  ret.data.id;
                    if (circle_id) {
                        $("#program_circle_id").val(circle_id);
                    }
                });
            } else {
                $("#program_circle_id").val(0);
            }
        });

        // 展示字段项
        $(".add_list_views").click(function(){
            var  timestamp=(new Date()).valueOf();
            var_list_views_html = '';
            var_list_views_html += '<div class="col-md-12 form-inline" id='+timestamp+' style="margin-top: 5px;">';
            var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="list_views_group_id[]" placeholder="status">';
            var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-9" name="list_views_group_fields[]" placeholder="fields">';
            var_list_views_html += '<a href="javascript:;" onclick="del_list_views('+timestamp+')">';
            var_list_views_html += '<i class="fa fa-times fa-fw" style="color: #ff0000;"></i>';
            var_list_views_html += '</a>';
            var_list_views_html += '</div>';

            $(".list_views_div").append(var_list_views_html);
        });
    })
    function del_list_views(id) {
        $("#"+id).remove();
    }
</script>
@endsection
