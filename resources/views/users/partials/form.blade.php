<div class="card">

    <div class="card-header">
        <strong>Seleccionar un agente</strong>
    </div>

    <div class="card-body">

        <div class="form-group row">
            <div class="col-6">
                {!! Form::label('agent_id', 'Agente') !!}

                {!! Form::select('agent_id', $agents, null, ['class' => 'form-control','placeholder'=>'Seleccionar un agente...']) !!}
            </div>
        </div>

    </div>

</div>

<div class="user-data-container d-none">

    <div class="card">

        <div class="card-header">
            <strong>Datos del agente seleccionado</strong>
        </div>

        <div class="card-body user-data row">

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos del usuario</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-12">
                    {!! Form::label('role_id', 'Acceso') !!}

                    {!! Form::select('role_id', $roles, isset($user) ? $user->roles[0]->id : null, ['class' => 'form-control','placeholder'=>'Seleccionar un rol...']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Nombre de usuario'); !!}
                    {!! Form::text('name',null,['class'=>'form-control','required']); !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('email', 'E-mail'); !!}
                    {!! Form::email('email',null,['class'=>'form-control','required']); !!}
                </div>

                @if(!isset($user))

                <div class="form-group col-sm-6">
                    {!! Form::label('password', 'Contraseña'); !!}
                    {!! Form::password('password',['class'=>'form-control','required']); !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('password_confirmation', 'Repetir contraseña'); !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control','required']); !!}
                </div>

                @endif
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary float-right">
        Guardar&emsp;<span class="fa fa-save"></span>
    </button>

    <a href="{{ route('users.index') }}" class="btn btn-danger float-left">Cancelar&emsp;<span
                class="fa fa-times"></span></a>

</div>

@section('scripts')
    <script>
        let agent_id = $('select#agent_id');
        let user_data_container = $('div.user-data-container');

        $(document).ready(function () {

            if (agent_id.val()) {
                findAgent(agent_id.val());
            }

            agent_id.change(function () {
                user_data_container.addClass('d-none');
                if ($(this).val()) {
                    findAgent($(this).val());
                }

            })

        });

        function findAgent(agent_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/agents/${agent_id}`,
                type: 'GET',
                data: {},
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (response) {
                    user_data_container.find('.user-data').empty();

                    if (response.agent) {
                        user_data_container.removeClass('d-none');

                        $.each(response.agent, function (field, value) {
                            user_data_container.find('.user-data').append(`
                                <div class="col-sm-6"><p><span>${field}: </span><strong>${value}</strong></p></div>
                            `);
                        })
                    }
                }
            });
        }
    </script>
@endsection