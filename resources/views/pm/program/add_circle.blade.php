<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px;">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">{{$title}}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="col-md-12 font-size-h3 font-w600 pb-4 mb-4 text-center border-bottom">
                            项目期设置
                        </div>
                        <form class="js-validation font-size-sm" action="{{url("/program/save_circle")}}" method="POST" id="myform">
                            <input type="hidden" name="id" id="id" value="{{isset($circle['id'])?$circle['id']:0}}">
                            <input type="hidden" name="program_id" id="program_id" value="{{isset($circle['program_id'])?$circle['program_id']:0}}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">项目期名称<span class="text-danger"> * &nbsp;</span></label>
                                    <input class="form-control required" id="name" name="name" type="text" placeholder="" value="{{Arr::get($circle, 'name','')}}">
                                    <small class="form-text text-muted"></small>
                                </div>
                                <div class="col-md-6">
                                    <label for="apply_start_time">项目开始申请时间</label>
                                    <input class="js-flatpickr flatpickr-input form-control bg-white" id="apply_start_time" name="apply_start_time" type="text" value="{{Arr::get($circle, 'apply_start_time','')}}">
                                    <small class="form-text text-muted"></small>

                                </div>
                                <div class="col-md-6">
                                    <label for="apply_end_time">项目结束申请时间</label>
                                    <input class="js-flatpickr flatpickr-input form-control bg-white" id="apply_end_time" name="apply_end_time" type="text" value="{{Arr::get($circle, 'apply_end_time','')}}">
                                    <small class="form-text text-muted"></small>
                                </div>
                                <div class="col-md-6">
                                    <label for="project_start_time">项目开始时间</label>
                                    <input class="js-flatpickr flatpickr-input form-control bg-white" id="project_start_time" name="project_start_date" type="text" value="{{Arr::get($circle, 'project_start_date','')}}">
                                    <small class="form-text text-muted"></small>
                                </div>
                                <div class="col-md-6">
                                    <label for="password">项目结束时间</label>
                                    <input class="js-flatpickr flatpickr-input form-control bg-white" id="project_end_time" name="project_end_date" type="text" value="{{Arr::get($circle, 'project_end_date','')}}">
                                    <small class="form-text text-muted"></small>
                                </div>
                                <div class="col-md-6">
                                    <label for="is_enabled">启用</label>
                                    <select name="is_enabled" id="is_enabled" class="js-select2 form-control">
                                        <option value="0" @if(0 == Arr::get($circle, 'is_enabled',0) || empty(Arr::get($circle, 'is_enabled',''))) selected @endif >否</option>
                                        <option value="1" @if(1 == Arr::get($circle, 'is_enabled',0)) selected @endif >是</option>
                                    </select>
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full text-right bg-light">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">取消</button>
                <button type="button" class="submit btn btn-sm btn-primary" onclick="javascript:submit_form();">确认
                </button>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#myform").validate();
    });
</script>
