<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <div id="horizontal-navigation-hover-normal-dark" class="d-none d-lg-block mt-2 mt-lg-0">
            <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-dark">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{url('/')}}">
                        <img src="{{url('/media/photos/logo.png')}}" style="height:22px;">
                    </a>
                </li>
                @include('public/pm/menu_nav')
            </ul>
        </div>
        <!-- Right Section -->
        <div>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="d-none d-sm-inline-block">Admin</span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-2 font-size-sm">
                        <a class="dropdown-item" href="be_pages_generic_profile.html">
                            <i class="far fa-fw fa-user mr-1"></i> 个人信息
                        </a>
                        <div role="separator" class="dropdown-divider"></div>

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-building mr-1"></i> 基础设置
                        </a>
                        <!-- END Side Overlay -->

                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('/logout')}}">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> 退出系统
                        </a>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
    </div>
</header>
