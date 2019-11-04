<div class="form-group col-sm-4">
    {!! Form::label('year', 'Ciclo lectivo') !!}

    <p><strong>{{ $career->year }}</strong></p>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('career', 'Carrera') !!}

    <p><strong>{{ $career->name }}</strong></p>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('course', 'Curso') !!}

    <p><strong>{{ $course->name }}</strong></p>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('name', 'Nombre de la asignatura') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('career_course_division_id', 'División') !!}

    {!! Form::select('career_course_division_id', $course->divisions->pluck('name','id'), null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccionar']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('regimen_id', 'Régimen') !!}

    {!! Form::select('regimen_id', $regimens, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccionar']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('hours', 'Horas cátedra') !!}

    {!! Form::text('hours', null, ['class' => 'form-control', 'required']) !!}
</div>

