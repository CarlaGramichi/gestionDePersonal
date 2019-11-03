<div class="form-group col-sm-3">
    {!! Form::label('year', 'Ciclo lectivo') !!}

    <p><strong>{{ $career->year }}</strong></p>
</div>

<div class="form-group col-sm-3">
    {!! Form::label('career', 'Carrera') !!}

    <p><strong>{{ $career->name }}</strong></p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre del curso') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>