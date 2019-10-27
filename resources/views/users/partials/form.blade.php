
<div class="card">
    <div class="card-header">
        <strong>Información personal</strong>
    </div>
    <div class="card-body">
        <div class="form-group row">

            <div class="col-4">
                {!! Form::label('name', 'Nombre'); !!}
                {!! Form::text('name',null,['class'=>'form-control']); !!}
            </div>

            <div class="col-4">
                {!! Form::label('surname', 'Apellido'); !!}
                {!! Form::text('surname',null,['class'=>'form-control']); !!}
            </div>

            <div class="col-4">
                {!! Form::label('dni', 'D.N.I.'); !!}
                {!! Form::text('dni',null,['class'=>'form-control']); !!}
            </div>

        </div>
    </div>
</div>
