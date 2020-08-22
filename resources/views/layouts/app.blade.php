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
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    @yield('stylesheets')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

<div id="app">

    @include('layouts.loader')

    @include('layouts.header')

    <div class="app-body">

        @include('layouts.sidebar')

        <main class="main">

            @yield('breadcrumbs')

            @include('partials.breadcrumbs')

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

{{-- App --}}
<script src="{{ asset(mix('js/app.js')) }}"></script>

{{-- DataTables --}}
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

{{-- Sweetalert --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>

@yield('scripts')

<script src="{{ mix('js/global.js') }}"></script>

</body>
</html>
