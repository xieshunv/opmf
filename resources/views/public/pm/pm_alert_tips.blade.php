@if(request()->session()->get('success'))
    <div class="tips alert alert-tips alert-success alert-dismissable" style="z-index: 1000" role="alert">
        <button type="button" class="close" data-dismiss="tips" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0">{{request()->session()->pull('success')}}</p>
    </div>
@endif
@if(request()->session()->get('error'))
    <div class="tips alert alert-tips alert-danger alert-dismissable" style="z-index: 1000" role="alert">
        <button type="button" class="close" data-dismiss="tips" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0">{{request()->session()->pull('error')}}</p>
    </div>
@endif
<div class="alert alert-tips ajax_save alert-success alert-dismissable" style="display: none;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <p class="mb-0">自动保存成功</p>
</div>