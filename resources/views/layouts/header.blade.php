<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('dashboard') }}">
        <img class="navbar-brand-full" src="{{asset('images/brand/ecs_logo_2.png')}}" width="89" height="25"
             alt="SAIT Logo">
        <img class="navbar-brand-minimized" src="{{asset('images/brand/ecs_icon.png')}}" width="30" height="30"
             alt="SAIT Logo">
    </a>
    <button class="navbar-toggler  d-md-down-none sidebar-minimizer brand-minimizer" type="button"
            data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('agents.index') }}">Alta de un agente</a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('agents.assign.positions') }}">Asignar propuestas</a>
        </li>
    </ul>

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
                <img class="img-avatar" src="{{asset('images/avatars/2.jpg')}}" alt="{{auth()->user()->name}}"
                     title="{{auth()->user()->name}}">
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">
                    <p><strong>{{ auth()->user()->name }}</strong></p>
                </a>

                <div class="dropdown-header text-center">
                    <strong>{{__('Panel de control')}}</strong>
                </div>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i>
                    {{__('Perfil')}}
                </a>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i>
                    {{__('Configuración')}}
                </a>

                <div class="dropdown-divider"></div>


                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="#" onclick="$(this).parent('form').submit()">
                        <i class="fa fa-lock"></i> {{__('Salir')}}
                    </a>
                </form>
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