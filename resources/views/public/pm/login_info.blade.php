<div>
    <!-- User Dropdown -->
    <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="nav-main-link-icon fa fa-user"></i>
            <span class="d-none font-size-sm d-sm-inline-block">{{$userinfo['username']}}</span>
            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu  dropdown-menu-right dropdown-menu-lg p-0" aria-labelledby="page-header-user-dropdown">
            <div class="rounded-top font-w600 text-white text-center bg-image" style="background-image: url('/media/photos/photo13.jpg');">
                <div class="p-3">
                    <img class="img-avatar img-avatar-thumb" src="{{url('/media/avatars/avatar1.jpg')}}" alt="">
                    <div class="text-white-75"><span class="badge badge-danger">超级管理员</span></div>
                </div>
                <div class="p-3 bg-black-75">

                    <a class="text-white font-w600" href="javascript:;">
                        {{$userinfo['realname']}}
                    </a>
                    <div class="text-white-75">{{$userinfo['email']}}</div>
                </div>
            </div>
            <div class="p-2 font-size-sm">
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{url('/profile/edit')}}">
                    个人资料<i class="fa fa-fw fa-user text-black-50 ml-1"></i>
                </a>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{url('/profile/pwd')}}">
                    修改密码 <i class="fa fa-fw fa-pencil-alt text-black-50 ml-1"></i>
                </a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{url('/logout')}}">
                    退出系统 <i class="fa fa-fw fa-sign-out-alt  ml-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END User Dropdown -->
</div>
