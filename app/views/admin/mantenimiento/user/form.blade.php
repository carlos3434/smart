<!-- /.modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
  <!--<div class="modal-dialog modal-lg">-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              ×
          </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_user" name="form_personas_modal" action="" method="post" autocomplete="off" >
            <div class="row">

                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_nombres" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombres">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" v-model='user.nombres'>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_apellidos" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Apellidos">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese Apellidos" v-model='user.apellidos'>
                </div>
              
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_dni" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese DNI">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese DNI" v-model='user.dni'>
                  </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_direccion" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Dirección">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Dirección" v-model='user.direccion'>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_numero_telefono" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Teléfono">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Teléfono" v-model='user.numero_telefono'>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_email" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese email">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese email" v-model='user.email'>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_fecha_nacimiento" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Fecha de Nacimiento">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" placeholder="AAAA-MM-DD" class="form-control datepicker" data-dateformat="dd/mm/yy" autocomplete="off" onfocus="blur()" v-model='user.fecha_nacimiento'>
                </div>

                <div class="col-sm-4">
                  <label class="control-label">

                  </label>
                  <select class="form-control" v-model='user.genero'>
                      <option value='' style="display:none">.:Seleccione:.</option>
                      <option value='F'>Femenino</option>
                      <option value='M' selected>Masculino</option>
                  </select>
                </div>

                <div class="col-sm-4">
                  <label class="control-label">

                  </label>
                  <select class="form-control" v-model='user.estado'>
                      <option value='' style="display:none">.:Seleccione:.</option>
                      <option value='0'>Inactivo</option>
                      <option value='1' selected>Activo</option>
                  </select>
                </div>
            </div>
            <div class="row">

              
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_username" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="User">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="user" v-model='user.username'/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_password" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Password">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="password" class="form-control" placeholder="Ingrese Password" v-model='user.password'>
                </div>
            </div>
              
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                          <label>
                            
                          </label>
                          <select multiple style="width:100%" class="select2" v-model="selected">
                              <template v-for="modulo in modulos">
                                  <optgroup :label="modulo.nombre">

                                      <option v-for="submodulo in modulo.children" v-bind:value="submodulo.id">
                                        @{{ submodulo.nombre }}
                                      </option>
                                  </optgroup>
                              </template>
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-graduation-cap"></i>
                    <h3 class="box-title">DATOS ACADÉMICOS
                      <a @click="addRow" class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
                    </h3>
                </div>
              

                <div class="box-body">
                  <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th class="col-md-3" style="text-align:center;">Universidad</th>
                      <th class="col-md-3" style="text-align:center;">Titulo Profesional</th>
                      <th class="col-md-1" style="text-align:center;">Subir Archivo</th>
                      <th class="col-md-1" style="text-align:center;">[]</th>
                    </tr>
                    </thead>
                    <tbody id="tr_academicos">
                      <tr v-for="(item, index) in rows">
                        <td>
                            <textarea class="form-control" v-model='item.universidad'></textarea>
                        </td>
                        <td>
                            <textarea class="form-control" v-model='item.titulo'></textarea>
                        </td>
                        <td>
                            <input type="text" maxlength="4" class="form-control fecha" v-model='item.anio'>
                        </td>
                        <td>
                            <button type="button" @click="removeRow(index)" class="fa fa-remove delete-button"></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                

            </div>
            <ul class="list-group" id="t_cargoPersona"></ul>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" @click.prevent="guardarUser" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
