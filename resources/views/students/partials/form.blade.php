<div class="card">

    <div class="card-header">
        <strong>Datos del alumno {{ isset($student) ? $student->name : '' }}</strong>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-sm-4">
                {!! Form::label('identification', 'DNI') !!}

                {!! Form::text('identification', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off', 'maxlength'=>8,'minlength'=>8]) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('name', 'Apellido(s) y nombre(s) completos') !!}

                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('born_date', 'Fecha de nacimiento') !!}

                {!! Form::text(null, isset($student) && $student->born_date ? $student->born_date->format('d/m/Y') : null, ['class' => 'form-control date-range-picker date-mask','data-field'=>'born_date','id'=>'born_date']) !!}
                <input type="hidden" name="born_date" value="{{ isset($student) && $student->born_date ? $student->born_date->format('Y-m-d') : null }}">
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('email', 'E-mail') !!}

                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('phone', 'Teléfono') !!}

                {!! Form::text('phone', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('city', 'Ciudad') !!}

                {!! Form::text('city', 'Catamarca', ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('state', 'Provincia') !!}

                {!! Form::text('state', 'San Fernando del Valle de Catamarca', ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
            </div>

        </div>

    </div>

</div>
