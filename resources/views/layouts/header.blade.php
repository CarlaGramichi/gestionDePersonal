<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('images/brand/logo.svg')}}" width="89" height="25" alt="SAIT Logo">
        <img class="navbar-brand-minimized" src="{{asset('images/brand/sygnet.svg')}}" width="30" height="30"
             alt="SAIT Logo">
    </a>
    <button class="navbar-toggler  d-md-down-none sidebar-minimizer brand-minimizer" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>

        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <img class="img-avatar" src="{{asset('images/avatars/2.jpg')}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}">
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header text-center">
                    <strong>{{__('Settings')}}</strong>
                </div>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i>
                    {{__('Profile')}}
                </a>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i>
                    {{__('Settings')}}
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-lock"></i> {{__('Logout')}}</a>
            </div>
        </li>
    </ul>
{{--    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
{{--    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
</header>