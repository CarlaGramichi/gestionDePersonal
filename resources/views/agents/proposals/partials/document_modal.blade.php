<div class="modal fade" id="document-upload-modal" tabindex="-1" role="dialog" aria-labelledby="document-upload-label"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="document-upload-label">Cargar un documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('agents.proposals.{agent_position_type_transaction}.documents.upload',['agent_position_type_transaction'=>$agentPositionTypeTransaction->id]) }}"
                  method="POST" enctype="multipart/form-data">

                <div class="data"></div>

                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label for="resolution_number">Número de resolución</label>

                        <input type="text" id="resolution_number" name="resolution_number" class="form-control" required>
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
