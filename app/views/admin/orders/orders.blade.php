@extends('layout.master')
@section('includes')

  
    @parent
        {{ HTML::style('js/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    <!-- css -->
    @stop

@section('main')
  <style type="text/css">
    table{
      width: 100%;
    }
    td{
      padding: 4px;
    }
    .multiselect{
      width: 100%;
    }

    .col-xxs-12{
      width: 100%;
    }

  </style>

  <!-- RIBBON -->
  <div id="ribbon">

    <span class="ribbon-button-alignment"> 
      <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
        <i class="fa fa-refresh"></i>
      </span> 
    </span>

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li>Home</li><li>Dashboard</li>
    </ol>
    <!-- end breadcrumb -->

    <!-- You can also add more buttons to the
    ribbon for further usability

    Example below:

    <span class="ribbon-button-alignment pull-right">
    <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
    <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
    <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
    </span> -->

  </div>
  <!-- END RIBBON -->

      <!-- MAIN CONTENT -->
      <div id="content">
      <h3>Pedidos  <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#nuevoPedido ">Nuevo <i class="glyphicon glyphicon-plus"></i></span></h3>
      </div>
      <!-- END MAIN CONTENT -->
@stop

@section('formulario')
  @include( 'admin.orders.form.nuevo' )
    {{-- @include( 'admin.mantenimiento.form.persona' )  --}}
@stop

@push('scripts_custom')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="js/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>


    <script src="/admin/slct_global_ajax.js"></script>
    <script src="/admin/slct_global.js"></script>
    <script src="/admin/order/order_ajax.js"></script>
    <script src="/admin/order/order.js"></script>
@endpush