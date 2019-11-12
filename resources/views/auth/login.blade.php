<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
<div class="container">
    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card-group">

                    <div class="card p-4">

                        <div class="card-body">

                            <h1 class="mb-5">{{ __('Login') }}</h1>

                            @error('email')
                            <div class="alert alert-danger">
                                <p>Ups... <strong>{{ $message }}</strong></p>
                            </div>
                            @enderror

{{--                            <p class="text-muted">{{ __('Sign In to your account') }}</p>--}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" name="email">

                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password">

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4 btn-block" type="submit">{{__('Login')}}</button>
                                </div>
                            </div>

                            <div class="form-group row text-right mt-2">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>SAIT</h2>
                                <img src="{{ asset('images/brand/ecs_logo_2.png') }}" class="img-fluid mt-5" alt="EndlessCodeStudio" title="EndlessCodeStudio">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    console.log($('body').html())
</script>
</body>