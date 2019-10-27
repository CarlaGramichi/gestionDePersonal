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

    <div class="col-sm-12">
        {!! Form::model($user,['url' => 'user.update',$user->id]) !!}

        @include('users.partials.form')

        {!! Form::close() !!}
    </div>

@endsection