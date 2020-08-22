@extends('layouts.app')

@section('content')

    @include('partials.alerts')

    {!! Form::model($student,['route' => ['students.update', $student->id], 'method' => 'PUT']) !!}

    @include('students.partials.form')

    @include('partials.form_buttons',['route'=>'students.index'])

    {!! Form::close() !!}

@endsection
