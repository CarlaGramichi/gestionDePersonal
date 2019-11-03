<div class="card">

    <div class="card-header">
        <strong>Datos Personales</strong>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('agent[name]','Nombre') !!}

                {!! Form::text('agent[name]',null, ['class'=>'form-control', 'required']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[surname]','Apellido') !!}

                {!! Form::text('agent[surname]',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[dni]','DNI') !!}

                {!! Form::text('agent[dni]',null, ['class'=>'form-control', 'maxlenght'=>'8']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[born_date]','Fecha de Nacimiento') !!}

                {!! Form::text('agent[born_date]',null, ['class'=>'form-control date-range-picker','readonly']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[cuil]','CUIL/CUIT') !!}

                {!! Form::text('agent[cuil]',null, ['class'=>'form-control', 'maxlenght'=>'8']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[email]','E-mail') !!}

                {!! Form::email('agent[email]',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[phone]','Teléfono') !!}

                {!! Form::text('agent[phone]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[cellphone]','Celular') !!}

                {!! Form::text('agent[cellphone]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[address]','Dirección') !!}

                {!! Form::text('agent[address]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[city]','Localidad') !!}

                {!! Form::text('agent[city]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[state]','Provincia') !!}

                {!! Form::text('agent[state]',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[country]','Nacionalidad') !!}

                {!! Form::text('agent[country]',null, ['class'=>'form-control']) !!}
            </div>
        </div>

    </div>

</div>




<div class="card">

    <div class="card-header">
        <strong>Datos de Contacto</strong>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="form-group col-sm-12">
                {!! Form::label('contact[relationship_id]', 'Relación') !!}

                {!! Form::select('contact[relationship_id]', $relationships, null, ['class' => 'form-control']) !!}

            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[name]','Nombre') !!}

                {!! Form::text('contact[name]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[surname]','Apellido') !!}

                {!! Form::text('contact[surname]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[dni]','DNI') !!}

                {!! Form::text('contact[dni]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[born_date]','Fecha de Nacimiento') !!}

                {!! Form::text('contact[born_date]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[email]','E-mail') !!}

                {!! Form::text('contact[email]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[phone]','Teléfono') !!}

                {!! Form::text('contact[phone]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[cellphone]','Celular') !!}

                {!! Form::text('contact[cellphone]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[address]','Dirección') !!}

                {!! Form::text('contact[address]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[city]','Localidad') !!}

                {!! Form::text('contact[city]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[state]','Provincia') !!}

                {!! Form::text('contact[state]',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[country]','Nacionalidad') !!}

                {!! Form::text('contact[country]',null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>



<button type="submit" class="btn btn-success float-right mb-2">
    Guardar <span class="fa fa-save"></span>
</button>