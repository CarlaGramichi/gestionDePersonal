@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">{{__('Users')}}</a>
        </li>
        <!-- Breadcrumb Menu-->

    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12">
        {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'PUT']) !!}

        @include('users.partials.form')

        {!! Form::close() !!}
    </div>

@endsection