<div class="form-group col-sm-12">
    {!! Form::label('career', 'Cargo') !!}

    <p><strong>{{ $position->name }}</strong></p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre del subcargo') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('quota', 'Cantidad') !!}

    {!! Form::text('quota', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('points', 'Puntaje') !!}

    {!! Form::text('points', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label(null, 'Tot. puntos') !!}

    <p><strong class="total-points">0</strong></p>
</div>