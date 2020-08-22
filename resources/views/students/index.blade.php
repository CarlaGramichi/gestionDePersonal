@extends('layouts.app')

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-right text-right">
            <label>&nbsp;</label>
            <div class="clearfix"></div>
            <a href="{{ route('students.create') }}" class="btn btn-success btn-lg">
                Nuevo&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Apellido y nombre</th>
                <th>DNI</th>
                <th>F.nac.</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Carrera</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')

    <script>
        let table = $('#table');
        let dataTable;

        $(document).ready(function () {

            // year_selector.change(function () {
            //     dataTable.ajax.reload();
            // });

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!!route('students.index')!!}',
                },
                columnDefs: [{
                    targets: -1,
                    data: null,
                    defaultContent: '',
                    orderable: false,
                },],
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'identification',
                        name: 'identification'
                    },
                    {
                        data: 'born_date',
                        name: 'born_date',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            if (oData.born_date) {
                                $(nTd).html(moment(oData.born_date).format('DD/MM/YYYY'))
                            }
                        }
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'career_id',
                        name: 'career_id',
                        class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html(`<form method="post" action="{{ url('/') }}/students/${oData.id}/assign">@csrf<button type="submit" class="btn btn-sm btn-primary">Asignar</button></form>`)

                            if (Number(oData.career_id)) {
                                $(nTd).html(oData.career.name)
                            }
                        }
                    },
                    {
                        data: '',
                        class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton(
                                'Editar&emsp;<span class="fa fa-edit"></span>', 'edit mr-2',
                                'info'));
                            $(nTd).append(renderButton(
                                'Borrar&emsp;<span class="fa fa-trash"></span>', 'remove',
                                'danger'));
                        }
                    }
                ]
            })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`students/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `students/${row.id}`, {},
                        '{{ csrf_token() }}',
                        `Eliminar alumno ${row.name}`,
                        `Está por eliminar un alumno ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });
        })

    </script>
@endsection
