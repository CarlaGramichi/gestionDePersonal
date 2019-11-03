<div class="form-group col-sm-3">
    {!! Form::label('year', 'Ciclo lectivo') !!}

    <p><strong>{{ $career->year }}</strong></p>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('career', 'Carrera') !!}

    <p><strong>{{ $career->name }}</strong></p>
</div>

<div class="form-group col-sm-2">
    {!! Form::label('course', 'Curso') !!}

    <p><strong>{{ $course->name }}</strong></p>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('name', 'Nombre de la división') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>