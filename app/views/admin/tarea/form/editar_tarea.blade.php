<div class="modal fade" id="modal-tarea">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Tarea</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Código</label>
                        <input type="text" class="form-control" v-model='tarea.TaskNumber'>
                    </div>
                    <div class="col-md-6">
                        <label>EmployeeNumber</label>
                        <input type="text" class="form-control" v-model='tarea.EmployeeNumber'>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <label>Cordenada X</label>
                        <input type="text" class="form-control" v-model='tarea.coordx'>
                    </div>
                    <div class="col-md-6">
                        <label>Cordenada Y</label>
                        <input type="text" class="form-control" v-model='tarea.coordy'>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Tipo de Tarea</label>
                        <select class="form-control" v-model='tarea.tipo_tarea'>
                            <option>1</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Estado de Tarea</label>
                        <select class="form-control" v-model='tarea.estado_tarea'>
                            <option>1</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Observación</label>
                        <textarea class="form-control" rows="3" v-model='tarea.Description'></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-registrar">Enviar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
