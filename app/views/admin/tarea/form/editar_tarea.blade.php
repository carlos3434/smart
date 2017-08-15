<div class="modal fade" id="editar_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <ul class="nav nav-pills head nav-justified" id='nav_modal'>
                  <li class="active"><a data-toggle="tab" href="#tab_datos">Datos</a></li>
                  <li><a data-toggle="tab" href="#tab_movimientos">Movimientos</a></li>
                </ul>
            </div>

            <div class="tab-content" style="min-height: 600px;">
                <div id="tab_datos" class="tab-pane fade in active">
                    
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
                                <input type="text" placeholder="dd-mm-yyyy" class="form-control datepicker" data-dateformat="dd-mm-yy" onfocus="blur()" name='DueDate_editar' v-model='tarea.DueDate'>
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
                                <div class="form-control" id="editar_mapa_tarea" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab_movimientos" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Address</th>
                                        <th>coordx</th>
                                        <th>coordy</th>
                                        <th>fecha</th>
                                        <th>[]</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in movimientos'>
                                        <td>@{{index.id}}</td>
                                        <td>@{{index.Address}}</td>
                                        <td>@{{index.coordx}} metros</td>
                                        <td>@{{index.coordy}}</td>
                                        <td>@{{index.created_at}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" @click.prevent="verFormulario(index.id)">
                                                <i class="fa fa-eye fa-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 table-responsive">
                            <table id="t_paso_officetrack_tareas" class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Formulario </td>
                                        <td>@{{formulario.Form}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>@{{formulario.Description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Fecha</td>
                                        <td>@{{formulario.created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <template v-for="imagen in imagenes">
                                                <a class="fancybox-button" rel="fancybox-button">
                                                    <img :src="imagen.url" style="width:250px;height:250px;">
                                                </a>
                                            </template>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer_datos" class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click.prevent="guardarEditar">Enviar</button>
            </div>
            <div id="footer_movimientos" style="display: none;" class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
