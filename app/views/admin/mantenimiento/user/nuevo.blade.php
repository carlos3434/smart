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
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" name="txt_nombres" id="txt_nombres">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_apellidos" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Apellidos">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese Apellidos" name="txt_apellidos" id="txt_apellidos">
                </div>
              
                <div class="col-sm-4">
                    <label class="control-label">
                        <a id="error_dni" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese DNI">
                            <i class="fa fa-exclamation"></i>
                        </a>
                    </label>
                    <input type="text" class="form-control" placeholder="Ingrese DNI" name="txt_dni" id="txt_dni">
                  </div>
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_direccion" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Dirección">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Dirección" name="txt_direccion" id="txt_direccion">
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_numero_telefono" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Teléfono">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Teléfono" name="txt_numero_telefono" id="txt_numero_telefono">
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_email" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese email">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese email" name="txt_email" id="txt_email">
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_fecha_nacimiento" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Fecha de Nacimiento">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" placeholder="AAAA-MM-DD" class="form-control datepicker" data-dateformat="dd/mm/yy" autocomplete="off" onfocus="blur()">
                </div>

                <div class="col-sm-4">
                  <label class="control-label">

                  </label>
                  <select class="form-control" name="slct_genero" id="slct_genero">
                      <option value='' style="display:none">.:Seleccione:.</option>
                      <option value='F'>Femenino</option>
                      <option value='M' selected>Masculino</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">

                  </label>
                  <select class="form-control" name="slct_estado" id="slct_estado">
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
                  <input type="text" class="form-control" placeholder="user" id="txt_username" name="txt_username" onfocus="blur()"/>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">
                      <a id="error_password" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Password">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="password" class="form-control" placeholder="Ingrese Password" name="txt_password" id="txt_password">
                </div>
            </div>
              

          

            <div class="row">
              
                <div class="col-sm-6">
                  <label class="control-label">Roles:
                  </label>
                  <select class="form-control" name="slct_cargos" id="slct_cargos">
                  </select>
                </div>
                <div class="col-sm-6">
                    <br>
                    <button type="button" class="btn btn-success" Onclick="AgregarArea();">
                      <i class="fa fa-plus fa-sm"></i>
                      &nbsp;Nuevo
                    </button>
                </div>
              
            </div>
            <ul class="list-group" id="t_cargoPersona"></ul>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
