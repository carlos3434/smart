
<div class="modal fade" id="editar_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <ul class="nav nav-pills head nav-justified" id='nav_modal01'>
                  <li class="active"><a data-toggle="tab" href="#tab_informacion">Info</a></li>
                  <li><a data-toggle="tab" href="#tab_imagenes">Imagenes</a></li>
                  <li><a data-toggle="tab" href="#tab_construcciones">construccion</a></li>
                  <li><a data-toggle="tab" href="#tab_datos">datos</a></li>
                  <li><a data-toggle="tab" href="#tab_domicilios">domicilio</a></li>
                  <li><a data-toggle="tab" href="#tab_instalaciones">instalacion</a></li>
                  <li><a data-toggle="tab" href="#tab_propietarios">propietario</a></li>
                  <li><a data-toggle="tab" href="#tab_ubicaciones">ubicacion</a></li>
                  <li><a data-toggle="tab" href="#tab_anexos">Anexos</a></li>
                </ul>
            </div>

            <div class="tab-content" style="min-height: 600px;">
                <div id="tab_informacion" class="tab-pane fade in active">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Ficha</label>
                                <input type="text" class="form-control" v-model='tarea.ficha_p'>
                            </div>
                            <div class="col-md-4">
                                <label>codigo</label>
                                <input type="text" class="form-control" v-model='tarea.codigo_p'>
                            </div>
                            <div class="col-md-4">
                                <label>observaciones</label>
                                <input type="text" class="form-control" v-model='tarea.observaciones'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>dni_declarantes</label>
                                <input type="text" class="form-control" v-model='tarea.dni_declarantes'>
                            </div>
                            <div class="col-md-4">
                                <label>dni_fiscalizador</label>
                                <input type="text" class="form-control" v-model='tarea.dni_fiscalizador'>
                            </div>
                            <div class="col-md-4">
                                <label>dni_propietario</label>
                                <input type="text" class="form-control" v-model='tarea.dni_propietario'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>nombres_declarantes</label>
                                <input type="text" class="form-control" v-model='tarea.nombres_declarantes'>
                            </div>
                            <div class="col-md-4">
                                <label>nombres_fiscalizador</label>
                                <input type="text" class="form-control" v-model='tarea.nombres_fiscalizador'>
                            </div>
                            <div class="col-md-4">
                                <label>nombres_propietarios</label>
                                <input type="text" class="form-control" v-model='tarea.nombres_propietarios'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-control" id="editar_mapa_tarea" style="height: 300px;"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-control" id="editar_panorama_tarea" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab_imagenes" class="tab-pane">
                    <div class="modal-body">
                        <div v-for="number in currentNumber" transition="fade">
                            <img :src="imagenes[Math.abs(currentNumber) % imagenes.length].url" 
                            v-on:mouseover="stopRotation" 
                            v-on:mouseout="startRotation"/>
                        </div>
                        <p>
                          <a @click="prev">Previous</a> || <a @click="next">Next</a>
                        </p>
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
                                        <th>nombres</th>
                                        <th>domicilio_fiscal</th>
                                        <th>porcentaje_condominio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in datos'>
                                        <td>@{{index.numero}}</td>
                                        <td>@{{index.codigo_contribuyente}}</td>
                                        <td>@{{index.num_doc_identidad}}</td>
                                        <td>@{{index.nombres}}</td>
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
                                        <th>postal</th>
                                        <th>distrito</th>
                                        <th>codigo_via</th>
                                        <th>via</th>
                                        <th>nombre_via</th>
                                        <th>numero_monicipal</th>
                                        <th>departamento</th>
                                        <th>manzana</th>
                                        <th>lote</th>
                                        <th>telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in domicilios'>
                                        <td>@{{index.postal}}</td>
                                        <td>@{{index.distrito}}</td>
                                        <td>@{{index.codigo_via}}</td>
                                        <td>@{{index.via}}</td>
                                        <td>@{{index.nombre_via}}</td>
                                        <td>@{{index.numero_monicipal}}</td>
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
                                        <th>estado_conservacion</th>
                                        <th>largo</th>
                                        <th>ancho</th>
                                        <th>alto</th>
                                        <th>total</th>
                                        <th>valor_soles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in instalaciones'>
                                        <td>@{{index.codigo}}</td>
                                        <td>@{{index.desc_instalacion}}</td>
                                        <td>@{{index.fecha_termino}}</td>
                                        <td>@{{index.unidad_medida}}</td>
                                        <td>@{{index.material_predominante}}</td>
                                        <td>@{{index.estado_conservacion}}</td>
                                        <td>@{{index.largo}}</td>
                                        <td>@{{index.ancho}}</td>
                                        <td>@{{index.alto}}</td>
                                        <td>@{{index.total}}</td>
                                        <td>@{{index.valor_soles}}</td>
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
                                        <th>tipo_documento</th>
                                        <th>numero_documento</th>
                                        <th>nombres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in propietarios'>
                                        <td>@{{index.tipo_documento}}</td>
                                        <td>@{{index.numero_documento}}</td>
                                        <td>@{{index.nombres}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab_ubicaciones" class="tab-pane">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>codigo_uso</th>
                                        <th>uso_propiedad</th>
                                        <th>codigo_urbano</th>
                                        <th>cod_centro_poblado</th>
                                        <th>desc_centro_poblado</th>
                                        <th>cod_via</th>
                                        <th>via</th>
                                        <th>nombre_via</th>
                                        <th>numero</th>
                                        <th>block</th>
                                        <th>departamento</th>
                                        <th>manzana</th>
                                        <th>lote</th>
                                        <th>sublote</th>
                                        <th>area_declarada</th>
                                        <th>area_verificada</th>
                                        <th>area_comun</th>
                                        <th>area_propia</th>
                                        <th>longitud_fachada</th>
                                        <th>ubicacion</th>
                                        <th>clasificacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='index in ubicaciones'>
                                        <td>@{{index.codigo_uso}}</td>
                                        <td>@{{index.uso_propiedad}}</td>
                                        <td>@{{index.codigo_urbano}}</td>
                                        <td>@{{index.cod_centro_poblado}}</td>
                                        <td>@{{index.desc_centro_poblado}}</td>
                                        <td>@{{index.cod_via}}</td>
                                        <td>@{{index.via}}</td>
                                        <td>@{{index.nombre_via}}</td>
                                        <td>@{{index.numero}}</td>
                                        <td>@{{index.block}}</td>
                                        <td>@{{index.departamento}}</td>
                                        <td>@{{index.manzana}}</td>
                                        <td>@{{index.lote}}</td>
                                        <td>@{{index.sublote}}</td>
                                        <td>@{{index.area_declarada}}</td>
                                        <td>@{{index.area_verificada}}</td>
                                        <td>@{{index.area_comun}}</td>
                                        <td>@{{index.area_propia}}</td>
                                        <td>@{{index.longitud_fachada}}</td>
                                        <td>@{{index.ubicacion}}</td>
                                        <td>@{{index.clasificacion}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab_anexos" class="tab-pane">
                    <div class="modal-header">
                        <ul class="nav nav-pills head nav-justified" id='nav_modal02'>
                          <li class="active"><a data-toggle="tab" href="#anexo01">anexo01</a></li>
                          <li><a data-toggle="tab" href="#anexo02">anexo02</a></li>
                          <li><a data-toggle="tab" href="#anexo03">anexo03</a></li>
                        </ul>
                    </div>
                    <div class="tab-content" style="min-height: 600px;">
                        <div id="anexo01" class="tab-pane fade in active">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <ul class="nav nav-pills head nav-justified" id='nav_modal03'>
                                      <li class="active"><a data-toggle="tab" href="#tab_a_anuncios01">anuncios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_autorizaciones01">autorizaciones</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_biencomun01">biencomun</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_comunes01">comunes</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_documentos01">documentos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_masdatos01">datos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_propietarios01">propietarios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_ubicaciones01">ubicaciones</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content" style="min-height: 600px;">
                                    <div id="tab_a_anuncios01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>lados</th>
                                                            <th>autor</th>
                                                            <th>verificacion</th>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_anuncios_01'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.lados}}</td>
                                                            <td>@{{index.autor}}</td>
                                                            <td>@{{index.verificacion}}</td>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_autorizaciones01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_autorizaciones_01'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_biencomun01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>titulo</th>
                                                            <th>verificada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_biencomun_01'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.titulo}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_comunes01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>piso</th>
                                                            <th>construccion</th>
                                                            <th>material</th>
                                                            <th>conservacion</th>
                                                            <th>estado</th>
                                                            <th>muros</th>
                                                            <th>techos</th>
                                                            <th>pisos</th>
                                                            <th>puertas</th>
                                                            <th>revestimiento</th>
                                                            <th>banios</th>
                                                            <th>electricas</th>
                                                            <th>declarada</th>
                                                            <th>verificada</th>
                                                            <th>uca</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_comunes_01'>
                                                            <td>@{{index.piso}}</td>
                                                            <td>@{{index.construccion}}</td>
                                                            <td>@{{index.material}}</td>
                                                            <td>@{{index.conservacion}}</td>
                                                            <td>@{{index.estado}}</td>
                                                            <td>@{{index.muros}}</td>
                                                            <td>@{{index.techos}}</td>
                                                            <td>@{{index.pisos}}</td>
                                                            <td>@{{index.puertas}}</td>
                                                            <td>@{{index.revestimiento}}</td>
                                                            <td>@{{index.banios}}</td>
                                                            <td>@{{index.electricas}}</td>
                                                            <td>@{{index.declarada}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                            <td>@{{index.uca}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_documentos01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>numero</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_documentos_01'>
                                                            <td>@{{index.numero}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_masdatos01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                            <th>actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_masdatos_01'>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                            <td>@{{index.actividad}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_propietarios01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>tipo_documento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_propietarios_01'>
                                                            <td>@{{index.tipo_documento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_ubicaciones01" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>autorizada</th>
                                                            <th>verficada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_ubicaciones_01'>
                                                            <td>@{{index.autorizada}}</td>
                                                            <td>@{{index.verficada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="anexo02" class="tab-pane">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <ul class="nav nav-pills head nav-justified" id='nav_modal03'>
                                      <li class="active"><a data-toggle="tab" href="#tab_a_anuncios02">anuncios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_autorizaciones02">autorizaciones</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_biencomun02">biencomun</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_comunes02">comunes</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_documentos02">documentos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_masdatos02">datos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_propietarios02">propietarios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_ubicaciones02">ubicaciones</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content" style="min-height: 600px;">
                                    <div id="tab_a_anuncios02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>lados</th>
                                                            <th>autor</th>
                                                            <th>verificacion</th>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_anuncios_02'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.lados}}</td>
                                                            <td>@{{index.autor}}</td>
                                                            <td>@{{index.verificacion}}</td>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_autorizaciones02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_autorizaciones_02'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_biencomun02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>titulo</th>
                                                            <th>verificada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_biencomun_02'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.titulo}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_comunes02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>piso</th>
                                                            <th>construccion</th>
                                                            <th>material</th>
                                                            <th>conservacion</th>
                                                            <th>estado</th>
                                                            <th>muros</th>
                                                            <th>techos</th>
                                                            <th>pisos</th>
                                                            <th>puertas</th>
                                                            <th>revestimiento</th>
                                                            <th>banios</th>
                                                            <th>electricas</th>
                                                            <th>declarada</th>
                                                            <th>verificada</th>
                                                            <th>uca</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_comunes_02'>
                                                            <td>@{{index.piso}}</td>
                                                            <td>@{{index.construccion}}</td>
                                                            <td>@{{index.material}}</td>
                                                            <td>@{{index.conservacion}}</td>
                                                            <td>@{{index.estado}}</td>
                                                            <td>@{{index.muros}}</td>
                                                            <td>@{{index.techos}}</td>
                                                            <td>@{{index.pisos}}</td>
                                                            <td>@{{index.puertas}}</td>
                                                            <td>@{{index.revestimiento}}</td>
                                                            <td>@{{index.banios}}</td>
                                                            <td>@{{index.electricas}}</td>
                                                            <td>@{{index.declarada}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                            <td>@{{index.uca}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_documentos02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>numero</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_documentos_02'>
                                                            <td>@{{index.numero}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_masdatos02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                            <th>actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_masdatos_02'>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                            <td>@{{index.actividad}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_propietarios02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>tipo_documento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_propietarios_02'>
                                                            <td>@{{index.tipo_documento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_ubicaciones02" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>autorizada</th>
                                                            <th>verficada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_ubicaciones_02'>
                                                            <td>@{{index.autorizada}}</td>
                                                            <td>@{{index.verficada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="anexo03" class="tab-pane">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <ul class="nav nav-pills head nav-justified" id='nav_modal03'>
                                      <li class="active"><a data-toggle="tab" href="#tab_a_anuncios03">anuncios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_autorizaciones03">autorizaciones</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_biencomun03">biencomun</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_comunes03">comunes</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_documentos03">documentos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_masdatos03">datos</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_propietarios03">propietarios</a></li>
                                      <li><a data-toggle="tab" href="#tab_a_ubicaciones03">ubicaciones</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content" style="min-height: 600px;">
                                    <div id="tab_a_anuncios03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>lados</th>
                                                            <th>autor</th>
                                                            <th>verificacion</th>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_anuncios_03'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.lados}}</td>
                                                            <td>@{{index.autor}}</td>
                                                            <td>@{{index.verificacion}}</td>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_autorizaciones03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_autorizaciones_03'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_biencomun03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>codigo</th>
                                                            <th>descripcion</th>
                                                            <th>titulo</th>
                                                            <th>verificada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_biencomun_03'>
                                                            <td>@{{index.codigo}}</td>
                                                            <td>@{{index.descripcion}}</td>
                                                            <td>@{{index.titulo}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_comunes03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>piso</th>
                                                            <th>construccion</th>
                                                            <th>material</th>
                                                            <th>conservacion</th>
                                                            <th>estado</th>
                                                            <th>muros</th>
                                                            <th>techos</th>
                                                            <th>pisos</th>
                                                            <th>puertas</th>
                                                            <th>revestimiento</th>
                                                            <th>banios</th>
                                                            <th>electricas</th>
                                                            <th>declarada</th>
                                                            <th>verificada</th>
                                                            <th>uca</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_comunes_03'>
                                                            <td>@{{index.piso}}</td>
                                                            <td>@{{index.construccion}}</td>
                                                            <td>@{{index.material}}</td>
                                                            <td>@{{index.conservacion}}</td>
                                                            <td>@{{index.estado}}</td>
                                                            <td>@{{index.muros}}</td>
                                                            <td>@{{index.techos}}</td>
                                                            <td>@{{index.pisos}}</td>
                                                            <td>@{{index.puertas}}</td>
                                                            <td>@{{index.revestimiento}}</td>
                                                            <td>@{{index.banios}}</td>
                                                            <td>@{{index.electricas}}</td>
                                                            <td>@{{index.declarada}}</td>
                                                            <td>@{{index.verificada}}</td>
                                                            <td>@{{index.uca}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_documentos03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>numero</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_documentos_03'>
                                                            <td>@{{index.numero}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_masdatos03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>expediente</th>
                                                            <th>licencia</th>
                                                            <th>expedicion</th>
                                                            <th>vencimiento</th>
                                                            <th>actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_masdatos_03'>
                                                            <td>@{{index.expediente}}</td>
                                                            <td>@{{index.licencia}}</td>
                                                            <td>@{{index.expedicion}}</td>
                                                            <td>@{{index.vencimiento}}</td>
                                                            <td>@{{index.actividad}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_propietarios03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>tipo_documento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_propietarios_03'>
                                                            <td>@{{index.tipo_documento}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab_a_ubicaciones03" class="tab-pane">
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>autorizada</th>
                                                            <th>verficada</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for='index in a_ubicaciones_03'>
                                                            <td>@{{index.autorizada}}</td>
                                                            <td>@{{index.verficada}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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