<div class="modal fade" id="modal-tarea">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Tarea</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Código</label>
                        <input type="text" class="form-control" v-model='tarea.TaskNumber'>
                    </div>
                    <div class="col-md-4">
                        <label>Personal</label>
                        <select id='EmployeeNumber' style="width:100%" class="select2">
                              <template v-for="trabajador in trabajadores">
                                  <option v-bind:value="trabajador.EmployeeNumber">
                                    @{{ trabajador.nombres }}
                                  </option>
                              </template>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Cliente</label>
                        <input type="text" class="form-control" v-model='tarea.CustomerName'>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Fecha vencimiento</label>
                        <input type="text" placeholder="dd-mm-yyyy" class="form-control datepicker" data-dateformat="dd-mm-yy" onfocus="blur()" name='DueDate' v-model='tarea.DueDate'>
                    </div>
                    
                    <div class="col-md-4">
                        <label>Tipo de Tarea</label>
                        <select id='tipo_tarea_id' style="width:100%" class="select2">
                              <template v-for="tipo in tipotarea">
                                  <option v-bind:value="tipo.id">
                                    @{{ tipo.nombre }}
                                  </option>
                              </template>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Estado de Tarea</label>

                        <select id='estado_tarea_id' style="width:100%" class="select2">
                              <template v-for="estado in estadotarea">
                                  <option v-bind:value="estado.id">
                                    @{{ estado.nombre }}
                                  </option>
                              </template>
                        </select>

                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label>Direccion</label>
                        <input type="text" class="form-control" v-model='tarea.Address'>
                    </div>
                    <div class="col-md-9">
                        <label>Observación</label>
                        <input type="text" class="form-control" v-model='tarea.Description'>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-control" id="mapa_tarea" style="height: 300px;"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click.prevent="guardarTarea">Enviar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
