<div class="card">

    <div class="card-header">
        <strong>Datos Personales</strong>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('agent[name]','Nombre') !!}

                {!! Form::text('agent[name]',isset($agent) ? $agent->name : '', ['class'=>'form-control', 'required']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[surname]','Apellido') !!}

                {!! Form::text('agent[surname]',isset($agent) ? $agent->surname : '', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[dni]','DNI') !!}

                {!! Form::text('agent[dni]',isset($agent) ? $agent->dni : '', ['class'=>'form-control', 'maxlenght'=>'8']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[born_date]','Fecha de Nacimiento') !!}

                {!! Form::text('agent[born_date]',isset($agent) ? $agent->born_date->format('d/m/Y') : '', ['class'=>'form-control date-range-picker date-mask']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[cuil]','CUIL/CUIT') !!}

                {!! Form::text('agent[cuil]',isset($agent) ? $agent->cuil : '', ['class'=>'form-control', 'maxlenght'=>'8']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[email]','E-mail') !!}

                {!! Form::email('agent[email]',isset($agent) ? $agent->email : '', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[phone]','Teléfono') !!}

                {!! Form::text('agent[phone]',isset($agent) ? $agent->phone : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[cellphone]','Celular') !!}

                {!! Form::text('agent[cellphone]',isset($agent) ? $agent->cellphone : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[address]','Dirección') !!}

                {!! Form::text('agent[address]',isset($agent) ? $agent->address : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[city]','Localidad') !!}

                {!! Form::text('agent[city]',isset($agent) ? $agent->city : 'Catamarca', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('agent[state]','Provincia') !!}

                {!! Form::text('agent[state]',isset($agent) ? $agent->state : 'Catamarca', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('agent[country]','Nacionalidad') !!}

                {!! Form::text('agent[country]',isset($agent) ? $agent->country : 'Argentina', ['class'=>'form-control']) !!}
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

                {!! Form::select('contact[relationship_id]', $relationships ?? '', isset($agent->contact) ? $agent->contact->relationship_id : '', ['class' => 'form-control','required']) !!}

            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[name]','Nombre') !!}

                {!! Form::text('contact[name]',isset($agent->contact) ? $agent->contact->name : '', ['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[surname]','Apellido') !!}

                {!! Form::text('contact[surname]',isset($agent->contact) ? $agent->contact->surname : '', ['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[dni]','DNI') !!}

                {!! Form::text('contact[dni]',isset($agent->contact) ? $agent->contact->dni : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[born_date]','Fecha de Nacimiento') !!}

                {!! Form::text('contact[born_date]',isset($agent->contact->born_date) ? $agent->contact->born_date->format('d/m/Y') : '', ['class'=>'form-control date-range-picker date-mask']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[email]','E-mail') !!}

                {!! Form::text('contact[email]',isset($agent->contact) ? $agent->contact->email : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[phone]','Teléfono') !!}

                {!! Form::text('contact[phone]',isset($agent->contact) ? $agent->contact->phone : '', ['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[cellphone]','Celular') !!}

                {!! Form::text('contact[cellphone]',isset($agent->contact) ? $agent->contact->cellphone : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[address]','Dirección') !!}

                {!! Form::text('contact[address]',isset($agent->contact) ? $agent->contact->address : '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[city]','Localidad') !!}

                {!! Form::text('contact[city]',isset($agent->contact) ? $agent->contact->city : 'Catamarca', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[state]','Provincia') !!}

                {!! Form::text('contact[state]',isset($agent->contact) ? $agent->contact->state : 'Catamarca', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('contact[country]','Nacionalidad') !!}

                {!! Form::text('contact[country]',isset($agent->contact) ? $agent->contact->country : 'Argentina', ['class'=>'form-control']) !!}
            </div>


        </div>
        <button type="submit" class="btn btn-primary float-right mb-2">
            Guardar <span class="fa fa-save"></span>
        </button>

    </div>
</div>



