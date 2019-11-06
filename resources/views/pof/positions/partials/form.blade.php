<div class="form-group col-sm-4">
    {!! Form::label('year', 'Ciclo lectivo') !!}

    {!! Form::selectRange('year', 2018, 2040, isset($career) ? null : now()->year,['class' => 'form-control', 'required', 'placeholder' => 'Seleccionar']); !!}
</div>

<div class="form-group col-sm-8">
    {!! Form::label('name', 'Nombre del cargo') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>