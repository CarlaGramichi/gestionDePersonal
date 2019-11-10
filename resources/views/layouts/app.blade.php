<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.set_js_globals')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">

    @yield('stylesheets')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

<div id="app">

    @include('layouts.header')

    <div class="app-body">

        @include('layouts.sidebar')

        <main class="main">

            @yield('breadcrumbs')

            <div class="container-fluid">

                <div class="animated fadeIn">

                    <div class="row">

                        <div class="col-sm-12">

                            @yield('content')

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@yield('scripts')
<script src="{{ mix('js/global.js') }}"></script>
</body>
</html>
