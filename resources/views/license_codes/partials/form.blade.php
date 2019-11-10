



            <div class="form-group col-sm-6">
                {!! Form::label('code', 'Código') !!}
                {!! Form::text('code', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('licence_type_id', 'Tipo de Licencia') !!}
                {!! Form::select('license_type_id',$types, null,['class'=>'form-control', 'placeholder'=>'Seleccionar tipo de licencia']) !!}
            </div>

            <div class="form-group col-sm-12">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off','cols'=>'2','rows'=>'2', 'maxlength'=>'250']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('kind_days', 'Días') !!}
                {!! Form::select('kind_days',['corridos'=>'Corridos', 'habiles'=>'Hábiles'],'Corridos',['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('number_days', 'Cantidad de Días') !!}
                {!! Form::text('number_days', null, ['class' => 'form-control','required','autocomplete' => 'off']) !!}

            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('old_article', 'Artículo anterior') !!}
                {!! Form::text('old_article', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('new_article', 'Artículo nuevo') !!}
                {!! Form::text('new_article', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}

            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('granting_officer_id', 'Funcionario Otorgante') !!}
                {!! Form::select('granting_officer_id',$officers,null, ['class'=>'form-control', 'placeholder'=>'Seleccionar funcionario']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('intervening_officer_id', 'Funcionario Interviniente') !!}
                {!! Form::select('intervening_officer_id',$officers,null, ['class'=>'form-control', 'placeholder'=>'Seleccionar funcionario']) !!}
            </div>



