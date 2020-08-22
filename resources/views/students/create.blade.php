@extends('layouts.app')

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'students.store']) !!}


    @include('students.partials.form')


    @include('partials.form_buttons',['route'=>'students.index'])

    {!! Form::close() !!}

@endsection
