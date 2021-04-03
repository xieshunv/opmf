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
        @include('public/pm/login_info')
    </div>
</header>
