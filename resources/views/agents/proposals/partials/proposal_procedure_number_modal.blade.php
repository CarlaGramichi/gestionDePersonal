<div class="modal fade" id="procedure-number-modal" tabindex="-1" role="dialog" aria-labelledby="procedure-number-label"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="procedure-number-label">Cargar Nº de expediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action=""
                  method="POST" enctype="multipart/form-data">

                <div class="data"></div>

                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="fa fa-info-circle"></span>&emsp;Verificar que esté cargando el Nº de expeidente correcto. Luego de realizada la carga éste no se puede modificar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="procedure_number">Nº de expediente</label>

                        <input type="text" id="procedure_number" name="procedure_number" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>

    </div>

</div>