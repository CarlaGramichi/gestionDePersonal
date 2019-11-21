<div class="modal fade" id="file-upload-modal" tabindex="-1" role="dialog" aria-labelledby="file-upload-label"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="file-upload-label">Cargar documento de expediente</h5>
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
                            <span class="fa fa-info-circle"></span>&emsp;Verificar que se esté cargando el archivo correcto. Luego de realizada la carga éste no se puede modificar.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tmp_file">Documento (imágen o pdf)</label>

                        <input type="file" id="tmp_file" name="tmp_file" required>
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