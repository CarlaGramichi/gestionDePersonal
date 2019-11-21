<div class="card">

    <div class="card-header">
        <strong>Ingresar los datos del documento</strong>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-sm-6">
                {!! Form::label('name', 'Nombre del documento'); !!}

                {!! Form::text('name',null,['class'=>'form-control', 'required']); !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('auto_generate', 'Se genera automaticamente'); !!}

                {!! Form::select('auto_generate',[0 => 'No', 1 => 'Si'], 0, ['class'=>'form-control','required']); !!}
            </div>

        </div>

    </div>

</div>

<button type="submit" class="btn btn-primary float-right">
    Guardar&emsp;<span class="fa fa-save"></span>
</button>

<a href="{{ route('documents.index') }}" class="btn btn-danger float-left">
    Cancelar&emsp;<span class="fa fa-times"></span>
</a>