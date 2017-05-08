<!-- /.modal -->
<div class="modal fade" id="modal-pedido" tabindex="-1" role="dialog" aria-hidden="true">
<!-- <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-hidden="true"> -->
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header logo">
         <button type="button" class="close btn-xs" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Nuevo Pedido</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group col-md-12">
                <span>Ingrese Nombre: </span>
                <input class="form-control" type="text" name="" id="" placeholder="">
            </div>
            <div class="form-group col-md-12">
                <label>Seleccione Mesa: </label><br>
                <select class="form-control" name="slct_mesa" id="slct_mesa"></select>
            </div>
            <div class="form-group col-md-12">
                <span>Seleccione Usuario: </span>
                <select class="form-control" name="slct_users" id="slct_users"></select>
            </div>
          </div>
          <div class="col-md-6">
            <span>Seleccione Plato(s): </span>
            <table class="table-bordered table-hover table-striped dishes">
            <input type="hidden" id="txt_platos" name="txt_platos">
              <tr>
                <td style="width: 90%">
                  <select class="form-control" id="slct_plato" name="slct_plato">
                    
                  </select>
                </td>
                <td style="width: 10%">
                  <span class="btn btn-success btn-md btnAgregar"><i class="glyphicon glyphicon-plus"></i></span>
                </td>
              </tr>
              <tr>
                <td style="width: 90%">
                   <label>Ensalada Cesar's</label>
                </td>
                <td style="width: 10%">
                  <span class="btn btn-danger btn-md btnRemove"><i class="glyphicon glyphicon-remove"></i></span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border-top: 0px">
                 <span id="btnAgregarAnexo" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-save-file"></i> Guardar</span>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->

