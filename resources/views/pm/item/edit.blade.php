@extends('public.pm.html')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light border-top border-bottom">
            <div class="content content-full py-1">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <a href="{{url('/items?form_id='.$form_id)}}" class="flex-sm-fill font-size-sm font-w400 mt-2 mb-0 mb-sm-2">
                        <i class="fa fa-angle-right fa-fw text-primary"></i>字段列表
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
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{isset($item_id)?'Edit':'Add'}} Items</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10 font-size-sm">
                            <form class="js-validation" action="{{url("/items/save")}}" id="item_form" method="POST">
                                <input type="hidden" name="form_id" value="{{isset($form_id)?$form_id:''}}">
                                <input type="hidden" name="item_id" value="{{isset($item_id)?$item_id:''}}">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span class="badge-danger">Project表中已有字段:</span>
                                        <p class="alert alert-primary" role="alert" style="word-wrap:break-word; ">
                                            title,type,amount,address,zipcode,phone,email,fax,contact_name,contact_gender,contact_age,contact_mobile,contact_email,contact_department,contact_duty,contact_wechat,contact_qq,contact_birthday,description
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="display">显示名称 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" id="display" name="display" value="{{isset($item['display'])?$item['display']:''}}">
                                        <small class="form-text text-muted">姓名 / 扩展字段ABC</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="key">key(english only) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" id="key" name="key" value="{{isset($item['key'])?$item['key']:''}}">
                                        <small class="form-text text-muted">name / _meta_abc_123</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="type">类型 <span class="text-danger">*</span></label>
                                        <select class="custom-select" id="type" name="type">
                                            @foreach($field_types as $k=>$v)
                                            <option value="{{$k}}"  @if(isset($item['type']) && $item['type'] ==$k ) selected=true @endif>{{$v}}</option>
                                            @endforeach;
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="default_value">默认值</label>
                                        <input type="text" class="form-control" id="default_value" name="default_value" value="{{isset($item['param']['default_value'])?$item['param']['default_value']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="max_value">最大值</label>
                                        <input type="text" class="form-control" id="max_value" name="max_value" value="{{isset($item['param']['max_value'])?$item['param']['max_value']:''}}">
                                        <small class="form-text text-muted">类型为number有效</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="min_value">最小值</label>
                                        <input type="text" class="form-control" id="min_value" name="min_value" value="{{isset($item['param']['min_value'])?$item['param']['min_value']:''}}">
                                        <small class="form-text text-muted">类型为number有效</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="question_idx">问答题列表idx</label>
                                        <input type="text" class="form-control" id="question_idx" name="question_idx" value="{{isset($item['question_idx'])?$item['question_idx']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="param_require">是否必填</label>
                                        <select class="custom-select" id="param_require" name="param_require">
                                            <option value="0" @if(isset($item['param']['require']) && $item['param']['require'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['param']['require']) && $item['param']['require'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="tips">tips</label>
                                        <input type="text" class="form-control" id="tips" name="tips" value="{{isset($item['param']['tips'])?$item['param']['tips']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="param_placeholder">placeholder</label>
                                        <input type="text" class="form-control" id="param_placeholder" name="param_placeholder" value="{{isset($item['param']['placeholder'])?$item['param']['placeholder']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="options_list">options_list</label>
                                        <textarea class="form-control" name="options_list" rows="4">{{isset($item['param']['options'])?json_encode($item['param']['options'],JSON_UNESCAPED_UNICODE):''}}</textarea>
                                        <small class="form-text text-muted">标准的json 例如 {"10":"公办","20":"民办"}</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="param_dynamic_options">dynamic_options</label>
                                        <input type="text" class="form-control" id="param_dynamic_options" name="param_dynamic_options" value="{{isset($item['param']['dynamic_options'])?$item['param']['dynamic_options']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="param.disable_sort">table中关闭排序</label>
                                        <select class="custom-select" id="param.disable_sort" name="param.disable_sort">
                                            <option value="0" @if(isset($item['param']['disable_sort']) && $item['param']['disable_sort'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['param']['disable_sort']) && $item['param']['disable_sort'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="li_class">li_class</label>
                                        <input type="text" class="form-control" id="li_class" name="li_class" value="{{isset($item['li_class'])?$item['li_class']:'col-md-6'}}">
                                        <small class="form-text text-muted">col-md-12 (占据整行长) / hidden_label (隐藏标签显示)</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hidden.detail">详情页隐藏</label>
                                        <select class="custom-select" id="hidden.detail" name="hidden.detail">
                                            <option value="0" @if(isset($item['hidden']['detail']) && $item['hidden']['detail'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['hidden']['detail']) && $item['hidden']['detail'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="param_limit_type">limit_type</label>
                                        <input type="text" class="form-control" id="param_limit_type" name="param_limit_type" value="{{isset($item['param']['limit_type'])?$item['param']['limit_type']:''}}">
                                        <small class="form-text text-muted">最小值：min_as 默认留空为最大值</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hidden.edit">编辑页不生成dom</label>
                                        <select class="custom-select" id="hidden.edit" name="hidden.edit">
                                            <option value="0" @if(isset($item['hidden']['edit']) && $item['hidden']['edit'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['hidden']['edit']) && $item['hidden']['edit'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="param_limit_size">limit_size</label>
                                        <input type="text" class="form-control" id="param_limit_size" name="param_limit_size" value="{{isset($item['param']['limit_size'])?$item['param']['limit_size']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pparam_with_other">checkbox with_other</label>
                                        <select class="custom-select" id="param_with_other" name="param_with_other">
                                            <option value="0" @if(isset($item['param']['with_other']) && $item['param']['with_other'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['param']['with_other']) && $item['param']['with_other'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted">其他</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="search_type">search_type</label>
                                        <input type="text" class="form-control" id="search_type" name="search_type" value="{{isset($item['search_type'])?$item['search_type']:''}}">
                                        <small class="form-text text-muted">搜索方式：date_range, number_range</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="search_disable">search_disable</label>
                                        <select class="custom-select" id="search_disable" name="search_disable">
                                            <option value="0" @if(isset($item['search_disable']) && $item['search_disable'] ==0) selected=true @endif>否</option>
                                            <option value="1" @if(isset($item['search_disable']) && $item['search_disable'] ==1) selected=true @endif>是</option>
                                        </select>
                                        <small class="form-text text-muted">是否关闭检索</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="group.fixed_first_columns">Group:固定第一列</label>
                                        <input type="text" class="form-control" id="group.fixed_first_columns" name="group.fixed_first_columns" value="{{isset($item['group']['fixed_first_columns'])?implode(',',$item['group']['fixed_first_columns']):''}}">
                                        <small class="form-text text-muted">支持Group固定第一列,逗号分隔
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row group-options-div">
                                    <!-- list_views  -->
                                    <small class="col-md-8  rowform-text text-muted">Group:options</small>
                                    @if (isset($item['group']['options']) && !empty($item['group']['options']))
                                        @foreach($item['group']['options'] as $k=>$v)
                                            @if($k > 0)
                                            <div class="col-md-8 form-inline" id="{{$k}}" style="margin-top: 5px;">
                                                <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_key[]" placeholder="key" value="{{isset($v['key'])?$v['key']:''}}">
                                                <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_display[]" placeholder="显示名"  value="{{isset($v['display'])?$v['display']:''}}">
                                                <select class="custom-select mr-sm-2 mb-sm-0 col-2" id="group_options_group_type" name="group_options_group_type[]">
                                                    <option value="text" @if($v['type'] == 'text') selected @endif>text</option>
                                                    <option value="select" @if($v['type'] == 'select') selected @endif>select</option>
                                                    <option value="textarea" @if($v['type'] == 'textarea') selected @endif>textarea</option>
                                                    <option value="number" @if($v['type'] == 'number') selected @endif>number</option>
                                                    <option value="date" @if($v['type'] == 'date') selected @endif>date</option>
                                                    <option value="static" @if($v['type'] == 'static') selected @endif>static</option>
                                                </select>
                                                <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_class[]" placeholder="class" value="{{isset($v['class'])?$v['class']:''}}">
                                                <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_options[]" placeholder="options" value="{{isset($v['options'])?implode(',',$v['options']):''}}">
                                                <a href="javascript:;" onclick="del_list_views({{$k}})">
                                                    <i class="fa fa-times fa-fw" style="color: red;"></i>
                                                </a>
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="col-md-12 form-inline" style="margin-top: 5px;">
                                            <input type="text" class="form-control mr-sm-2 mb-sm-0 col-3" name="group_options_group_key[]" placeholder="key">
                                            <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_display[]" placeholder="显示名">
                                            <select class="custom-select mr-sm-2 mb-sm-0 col-2" id="group_options_group_type" name="group_options_group_type[]">
                                                <option value="text">text</option>
                                                <option value="select">select</option>
                                                <option value="textarea">textarea</option>
                                                <option value="number">number</option>
                                                <option value="date">date</option>
                                                <option value="static">static</option>
                                            </select>
                                            <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_class[]" placeholder="class">
                                            <input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_options[]" placeholder="options">
                                            <a href="javascript:;">
                                                <i class="fa fa-times fa-fw" style="color: red;"></i>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8" >
                                        <a href="javascript:;" class="btn btn-sm btn-primary add_group_options">
                                            <i class="fa fa-fw fa-plus mr-1"></i> 增加新记录
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="link.type">link_type</label>
                                        <input type="text" class="form-control" id="link.type" name="link.type" value="{{isset($item['link']['type'])?$item['link']['type']:''}}">
                                        <small class="form-text text-muted">table-td内容将转为a标签</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="link.column">link_column</label>
                                        <input type="text" class="form-control" id="link.column" name="link.column" value="{{isset($item['link']['column'])?$item['link']['column']:''}}">
                                        <small class="form-text text-muted">table-td内容将转为a标签 传递的参数</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="icon_link.type">icon_link_type</label>
                                        <input type="text" class="form-control" id="icon_link.type" name="icon_link.type" value="{{isset($item['icon_link']['type'])?$item['icon_link']['type']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="icon_link_column">icon_link_column</label>
                                        <input type="text" class="form-control" id="icon_link_column" name="icon_link_column" value="{{isset($item['icon_link']['column'])?$item['icon_link']['column']:''}}">
                                        <small class="form-text text-muted"></small>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="icon_link.suffix_icon">icon_link_suffix_icon</label>
                                        <input type="text" class="form-control" id="icon_link.suffix_icon" name="icon_link.suffix_icon" value="{{isset($item['icon_link']['suffix_icon'])?$item['icon_link']['suffix_icon']:''}}">
                                        <small class="form-text text-muted">table-td内容后缀a-icon</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sequence">显示顺序</label>
                                        <input type="text" class="form-control" id="sequence" name="sequence" value="{{isset($item['sequence'])?$item['sequence']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="display_colspan">详情占用列数</label>
                                        <input type="text" class="form-control" id="display_colspan" name="display_colspan" value="{{isset($item['display_colspan'])?$item['display_colspan']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="related_contact">关联联系人字段</label>
                                        <input type="text" class="form-control" id="related_contact" name="related_contact" value="{{isset($item['related_contact'])?$item['related_contact']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="param_ajax_link">动态调用链接</label>
                                        <input type="text" class="form-control" id="param_ajax_link" name="param_ajax_link" value="{{isset($item['param']['ajax_link'])?$item['param']['ajax_link']:''}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="field_xeditable">xeditable</label>
                                        <input type="text" class="form-control" id="field_xeditable" name="field_xeditable" value="{{isset($item['field_xeditable'])?$item['field_xeditable']:''}}">
                                        <small class="form-text text-muted">和「动态调用链接」互斥</small>
                                    </div>
                                </div>
                                <div class="form-group" style="font-size: 14px;">
                                    <div class="col-md-6">
                                        <p><a href="{{url('/items?form_id='.$form_id)}}">返回列表页</a></p>
                                        <div class="custom-control custom-checkbox custom-control-primary">
                                            <input type="checkbox" class="custom-control-input" id="submit_then_new" checked="checked" name="submit_then_new" value="1">
                                            <label class="custom-control-label" for="submit_then_new">提交后默认到新建页面</label>
                                        </div>
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
            // add list_views
            $(".add_group_options").click(function(){
                var  timestamp=(new Date()).valueOf();
                var_list_views_html = '';
                var_list_views_html += '<div class="col-md-12 form-inline" id='+timestamp+' style="margin-top: 5px;">';
                var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-3" name="group_options_group_key[]" placeholder="key">';
                var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_display[]" placeholder="显示名">';
                var_list_views_html += '<select class="custom-select mr-sm-2 mb-sm-0 col-2" id="group_options_group_type" name="group_options_group_type[]">';
                var_list_views_html += '<option value="text">text</option>';
                var_list_views_html += '<option value="text">select</option>';
                var_list_views_html += '<option value="text">textarea</option>';
                var_list_views_html += '<option value="text">number</option>';
                var_list_views_html += '<option value="text">date</option>';
                var_list_views_html += '<option value="text">static</option>';
                var_list_views_html += '</select>';
                var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_class[]" placeholder="class">';
                var_list_views_html += '<input type="text" class="form-control mr-sm-2 mb-sm-0 col-2" name="group_options_group_options[]" placeholder="options">';
                var_list_views_html += '<a href="javascript:;" onclick="del_group_options('+timestamp+')">';
                var_list_views_html += '<i class="fa fa-times fa-fw" style="color: red;"></i>';
                var_list_views_html += '</a>';
                var_list_views_html += '</div>';

                $(".group-options-div").append(var_list_views_html);
            });

            //表单验证
            $("#item_form").validate();
        })

        function del_group_options(id) {
           $("#"+id).remove();
        }

    </script>
@endsection
