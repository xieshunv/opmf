<div>
    <!-- User Dropdown -->
    <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="nav-main-link-icon fa fa-user"></i>
            <span class="d-none font-size-sm d-sm-inline-block">{{$userinfo['username']}}</span>
            <span class="badge badge-pill badge-danger ml-1">Super</span>
            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
            <div class="p-2 font-size-sm">
                <a class="dropdown-item" href="{{url('/profile/edit')}}">
                    <i class="fa fa-file-alt mr-1"></i> 个人资料
                </a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item " href="{{url('/profile/pwd')}}" >
                    <i class="fa fa-key mr-1"></i> 修改密码
                </a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('/logout')}}">
                    <i class="fa fa-fw fa-sign-out-alt mr-1"></i> 退出系统
                </a>
            </div>
        </div>
    </div>
    <!-- END User Dropdown -->
</div>


