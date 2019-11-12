<div class="form-group col-sm-4">
    {!! Form::label('cue', 'C.U.E.') !!}

    {!! Form::text('cue', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-4">
    {!! Form::label('name', 'Nombre de la institución') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('department', 'Departamento') !!}

    {!! Form::text('department', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('city', 'Ciudad') !!}

    {!! Form::text('city', 'Catamarca', ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('state', 'Provincia') !!}

    {!! Form::text('state', 'San Fernando del Valle de Catamarca', ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('country', 'País') !!}

    {!! Form::text('country', 'Argentina', ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>