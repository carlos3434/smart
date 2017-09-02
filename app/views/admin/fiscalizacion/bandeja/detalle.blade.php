<div class="modal fade" id="editar_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <ul class="nav nav-pills head nav-justified" id='nav_modal'>
                  <li class="active"><a data-toggle="tab" href="#tab_informacion">Info</a></li>
                  <li><a data-toggle="tab" href="#tab_construcciones">construcciones</a></li>
                  <li><a data-toggle="tab" href="#tab_datos">datos</a></li>
                  <li><a data-toggle="tab" href="#tab_domicilios">domicilios</a></li>
                  <li><a data-toggle="tab" href="#tab_instalaciones">instalaciones</a></li>
                  <li><a data-toggle="tab" href="#tab_prediouno">prediouno</a></li>
                  <li><a data-toggle="tab" href="#tab_prediodos">prediodos</a></li>
                  <li><a data-toggle="tab" href="#tab_prediotres">prediotres</a></li>
                  <li><a data-toggle="tab" href="#tab_propietarios">propietarios</a></li>
                </ul>
            </div>

            <div class="tab-content" style="min-height: 600px;">
                <div id="tab_informacion" class="tab-pane fade in active">
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
                <div id="tab_construcciones" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>piso</th>
                                        <th>fecha_construccion</th>
                                        <th>materiales_construccion</th>
                                        <th>estado_conservacion</th>
                                        <th>estado_construccion</th>
                                        <th>muros_columnas</th>
                                        <th>techos</th>
                                        <th>pisos</th>
                                        <th>puertas_ventanas</th>
                                        <th>revestimientos</th>
                                        <th>banios</th>
                                        <th>instalaciones_electricas</th>
                                        <th>area_construida_declarada</th>
                                        <th>area_construida_verificada</th>
                                        <th>uca</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in construcciones'>
                                        <td>@{{index.piso}}</td>
                                        <td>@{{index.fecha_construccion}}</td>
                                        <td>@{{index.materiales_construccion}}</td>
                                        <td>@{{index.estado_conservacion}}</td>
                                        <td>@{{index.estado_construccion}}</td>
                                        <td>@{{index.muros_columnas}}</td>
                                        <td>@{{index.techos}}</td>
                                        <td>@{{index.pisos}}</td>
                                        <td>@{{index.puertas_ventanas}}</td>
                                        <td>@{{index.revestimientos}}</td>
                                        <td>@{{index.banios}}</td>
                                        <td>@{{index.instalaciones_electricas}}</td>
                                        <td>@{{index.area_construida_declarada}}</td>
                                        <td>@{{index.area_construida_verificada}}</td>
                                        <td>@{{index.uca}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab_datos" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>numero</th>
                                        <th>codigo_contribuyente</th>
                                        <th>num_doc_identidad</th>
                                        <th>ape_nom_razon_social_condominio</th>
                                        <th>domicilio_fiscal</th>
                                        <th>porcentaje_condominio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in datos'>
                                        <td>@{{index.numero}}</td>
                                        <td>@{{index.codigo_contribuyente}}</td>
                                        <td>@{{index.num_doc_identidad}} metros</td>
                                        <td>@{{index.ape_nom_razon_social_condominio}}</td>
                                        <td>@{{index.domicilio_fiscal}}</td>
                                        <td>@{{index.porcentaje_condominio}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab_domicilios" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>cod_postal</th>
                                        <th>distrito</th>
                                        <th>cod_urbano</th>
                                        <th>conjunto_urbano</th>
                                        <th>cod_via</th>
                                        <th>via</th>
                                        <th>num_municipal</th>
                                        <th>departamento</th>
                                        <th>manzana</th>
                                        <th>lote</th>
                                        <th>telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in domicilios'>
                                        <td>@{{index.cod_postal}}</td>
                                        <td>@{{index.distrito}}</td>
                                        <td>@{{index.cod_urbano}} metros</td>
                                        <td>@{{index.conjunto_urbano}}</td>
                                        <td>@{{index.cod_via}}</td>
                                        <td>@{{index.via}}</td>
                                        <td>@{{index.num_municipal}}</td>
                                        <td>@{{index.departamento}}</td>
                                        <td>@{{index.manzana}} metros</td>
                                        <td>@{{index.lote}}</td>
                                        <td>@{{index.telefono}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab_instalaciones" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>codigo</th>
                                        <th>desc_instalacion</th>
                                        <th>fecha_termino</th>
                                        <th>unidad_medida</th>
                                        <th>material_predominante</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in instalaciones'>
                                        <td>@{{index.codigo}}</td>
                                        <td>@{{index.desc_instalacion}}</td>
                                        <td>@{{index.fecha_termino}}</td>
                                        <td>@{{index.unidad_medida}}</td>
                                        <td>@{{index.material_predominante}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab_prediouno" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>cod_predio</th>
                                        <th>departamento</th>
                                        <th>provincia</th>
                                        <th>distrito</th>
                                        <th>sector</th>
                                        <th>manzana</th>
                                        <th>lote</th>
                                        <th>edifica</th>
                                        <th>entrada</th>
                                        <th>peso</th>
                                        <th>unidad</th>
                                        <th>dc</th>
                                        <th>cod_uso</th>
                                        <th>uso_propiedad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in prediouno'>
                                        <td>@{{index.cod_predio}}</td>
                                        <td>@{{index.departamento}}</td>
                                        <td>@{{index.provincia}}</td>
                                        <td>@{{index.distrito}}</td>
                                        <td>@{{index.sector}}</td>
                                        <td>@{{index.manzana}}</td>
                                        <td>@{{index.lote}}</td>
                                        <td>@{{index.edifica}}</td>
                                        <td>@{{index.entrada}}</td>
                                        <td>@{{index.peso}}</td>
                                        <td>@{{index.unidad}}</td>
                                        <td>@{{index.dc}}</td>
                                        <td>@{{index.cod_uso}}</td>
                                        <td>@{{index.uso_propiedad}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab_prediodos" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>codigo_urbano</th>
                                        <th>centro_poblado</th>
                                        <th>desc_centro_poblado</th>
                                        <th>cod_via</th>
                                        <th>via</th>
                                        <th>numero</th>
                                        <th>block</th>
                                        <th>manzana</th>
                                        <th>lote</th>
                                        <th>sublote</th>
                                        <th>fecha_compra</th>
                                        <th>fecha_exon</th>
                                        <th>num_resolucion_municipal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in prediodos'>
                                        <td>@{{index.codigo_urbano}}</td>
                                        <td>@{{index.centro_poblado}}</td>
                                        <td>@{{index.desc_centro_poblado}}</td>
                                        <td>@{{index.cod_via}}</td>
                                        <td>@{{index.via}}</td>
                                        <td>@{{index.numero}}</td>
                                        <td>@{{index.block}}</td>
                                        <td>@{{index.manzana}}</td>
                                        <td>@{{index.lote}}</td>
                                        <td>@{{index.sublote}}</td>
                                        <td>@{{index.fecha_compra}}</td>
                                        <td>@{{index.fecha_exon}}</td>
                                        <td>@{{index.num_resolucion_municipal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab_prediotres" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>sum_luz</th>
                                        <th>sum_agua</th>
                                        <th>area_terreno_cecla</th>
                                        <th>area_terreno_verifica</th>
                                        <th>area_terreno_comun</th>
                                        <th>area_terreno_propia</th>
                                        <th>longitud_fachada</th>
                                        <th>ubicacion_parques</th>
                                        <th>clasificacion_predio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in prediotres'>
                                        <td>@{{index.sum_luz}}</td>
                                        <td>@{{index.sum_agua}}</td>
                                        <td>@{{index.area_terreno_cecla}}</td>
                                        <td>@{{index.area_terreno_verifica}}</td>
                                        <td>@{{index.area_terreno_comun}}</td>
                                        <td>@{{index.area_terreno_propia}}</td>
                                        <td>@{{index.longitud_fachada}}</td>
                                        <td>@{{index.ubicacion_parques}}</td>
                                        <td>@{{index.clasificacion_predio}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div id="tab_propietarios" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>codigo</th>
                                        <th>tipo_doc</th>
                                        <th>num_doc</th>
                                        <th>ape_nombres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in propietarios'>
                                        <td>@{{index.codigo}}</td>
                                        <td>@{{index.tipo_doc}}</td>
                                        <td>@{{index.num_doc}}</td>
                                        <td>@{{index.ape_nombres}}</td>
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
  
