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
                            <li class="breadcrumb-item">编辑</li>
                            <li class="breadcrumb-item active" aria-current="page">添加</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="col-md-12 font-size-h3 font-w600 pb-4 mb-4 text-center border-bottom">
                                {{Arr::get($data, 'title','')}}
                            </div>
                            <form class="js-validation font-size-sm" action="{{url("/program/save")}}" method="POST" id="myform">
                                <input type="hidden" name="id" id="id" value="{{Arr::get($data, 'id',0)}}">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="title">标题<span class="text-danger"> * </span></label>
                                        <input class="form-control required" id="title" name="title" type="text" placeholder="" value="{{Arr::get($data, 'title','')}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="short_title">缩写Title</label>
                                        <input class="form-control" id="short_title" name="short_title" type="text" placeholder="主要后台展示使用" value="{{Arr::get($data, 'short_title','')}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_enabled">是否启用</label>
                                        <select name="is_enabled" id="is_enabled" class="js-select2 form-control">
                                            <option value="0" @if(0 == Arr::get($data, 'is_enabled') || empty(Arr::get($data, 'is_enabled',''))) selected @endif >否</option>
                                            <option value="1" @if(1 == Arr::get($data, 'is_enabled')) selected @endif >是</option>
                                        </select>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-6">
                                        <label for="max_apply_count">可申请次数</label>
                                        <input class="form-control" id="max_apply_count" name="max_apply_count" type="text" placeholder="" value="{{Arr::get($data, 'max_apply_count',1)}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-6" >
                                        <label for="init_status_id">申请初始状态</label>
                                        <input class="form-control number" id="init_status_id" name="init_status_id" type="number" step="1" value="{{Arr::get($data, 'init_status_id','')}}">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-6" >
                                        <label for="apply_start_time">默认申请开始时间</label>
                                        <input class="js-flatpickr form-control bg-white flatpickr-input" id="apply_start_time" name="apply_start_time" type="text" placeholder="" value="{{Arr::get($data, 'apply_start_time','')}}" readonly="readonly">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-6" >
                                        <label for="apply_end_time">默认申请结束时间</label>
                                        <input class="js-flatpickr form-control bg-white flatpickr-input" id="apply_end_time" name="apply_end_time" type="text" placeholder="" value="{{Arr::get($data, 'apply_end_time','')}}" readonly="readonly">
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-12" >
                                        <label for="short_description">项目短描述</label>
                                        <textarea class="form-control" name="short_description" rows="6" id="short_description">{{Arr::get($data, 'short_description','')}}</textarea>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class=" col-md-12" >
                                        <label for="description">项目描述(申请入口页面)</label>
                                        <textarea class="form-control" name="description" rows="6" id="description">{{Arr::get($data, 'description','')}}</textarea>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                    <div class="col-md-12" >
                                        <label for="agreement">申请项目前协议</label>
                                        <textarea class="form-control" name="agreement" rows="6" id="agreement">{{Arr::get($data, 'agreement','')}}</textarea>
                                        <small class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit"  style="width: 100%;"  class="btn btn-lg btn-primary"><i class="far fa-save mr-2"></i>保 存</button>
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

    <script type="text/javascript">
        $(function(){
            $("#myform").validate();
        });
    </script>
@endsection