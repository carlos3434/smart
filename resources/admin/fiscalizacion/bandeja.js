let vm = new Vue({
    el: '#main',
    data: {
        errors: [],
        tarea: [],
        accion:'',
        construcciones:[],
        datos:[],
        domicilios:[],
        instalaciones:[],
        propietarios:[],
        ubicaciones:[],
        a_anuncios_01:[],
        a_anuncios_02:[],
        a_anuncios_03:[],
        a_autorizaciones_01:[],
        a_autorizaciones_02:[],
        a_autorizaciones_03:[],
        a_biencomun_01:[],
        a_biencomun_02:[],
        a_biencomun_03:[],
        a_comunes_01:[],
        a_comunes_02:[],
        a_comunes_03:[],
        a_documentos_01:[],
        a_documentos_02:[],
        a_documentos_03:[],
        a_masdatos_01:[],
        a_masdatos_02:[],
        a_masdatos_03:[],
        a_propietarios_01:[],
        a_propietarios_02:[],
        a_propietarios_03:[],
        a_ubicaciones_01:[],
        a_ubicaciones_02:[],
        a_ubicaciones_03:[],

        formulario:[],
        imagenes:[],
        trabajadores:[],
        tipotarea:[],
        estadotarea:[],
        map:[],
        markers:[],
        bounds:[],
        line:[],
        nomarkers:[],
        currentNumber: 0,
        timer: null
    },
    methods: {
        startRotation:function(){
            this.timer = setInterval(this.next, 3000);
        },
        next: function() {
            this.currentNumber += 1;
        },
        prev: function() {
            this.currentNumber -= 1;
        },
        guardarNuevo:function(){
            vm.tarea.DueDate =  $('input[name=DueDate_nuevo]').val();
            vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
            vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
            vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
            Tareas.store();
        },
        guardarEditar:function(){
            vm.tarea.DueDate =  $('input[name=DueDate_editar]').val();
            vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
            vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
            vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
            Tareas.update();
        },
        /**boton llama a modal, nuevo user */
        abrirNuevoModal: function () {
            $("#"+nuevo_modal).modal();
            vm.accion = 'nuevo';
            vm.tarea = {};
            vm.construcciones = {};
        },
        roles: function(){
            Roles.all();
        },
        verFormulario:function(id){
            Formulario.get(id);
        },
    },
});
var gm = google.maps;

var config = {
    el: 'mapa_tarea',
    lat: -12.109129,
    lon: -77.016123,
    zoom: 15,
    minZoom: 15,
    type: gm.MapTypeId.ROADMAP
};

var spiderConfig = {
    keepSpiderfied: true,
    event: 'mouseover'
};

var mapOptions = {
    center: new gm.LatLng(config.lat, config.lon),
    zoom: config.zoom,
    mapTypeId: config.type
};
var markerSpiderfier;
var infoWindows = [];
removeMarkers = function() {
    for (var i = 0; i < vm.markers.length; i++) {
        vm.markers[i].setMap(null);
    }
    vm.markers=[];
};

addMarker=function(location,label,icon,drag){
    var marker = new gm.Marker({
        position: location,
        //icon: icon,
        draggable: drag,
        map: vm.map
    });
    vm.markers.push(marker);
    vm.bounds.extend(location);
    marker.infowindow = new gm.InfoWindow({content: label});

    gm.event.addListener(marker,'click', function() {
        if(infoWindows.length>0){
            for (var j=0;j<infoWindows.length;j++) {
                infoWindows[j].close();
            }
        }
        this.infowindow.open(vm.map,this);
        infoWindows.push(this.infowindow);
    });
    markerSpiderfier.addMarker(marker);
};

////////////////////////////
var tabla='tabla_registro_tarea';
var editar_modal='editar_modal';//modal-tarea
var nuevo_modal='nuevo_modal';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $EmployeeNumber;
var $tipo_tarea_id;
var $estado_tarea_id;

var breakpointDefinition = {
    tablet : 1024,
    phone : 480
};

var columns=[
    {
        data: "ficha_p",
        name: "ficha_p",
        searchable:false
    },
    {
        data: "codigo_p",
        name: "codigo_p",
        searchable:false
    },
    {
        data: "FirstName",
        name: "FirstName",
        searchable:false
    },
    {
        data: "created_at",
        name: "created_at",
        searchable:false
    },
    {
        data: "observaciones",
        name: "observaciones",
        searchable:false
    },
    {
        name:"edicion",
        searchable:false,
        data: function ( row, type, val, meta ) {
            return '<td><button type="button" onClick="editar('+row.id+')" class="btn btn-primary">Editar</button></td>';
        },
        "defaultContent": '',
    },
    {
        name: "deleted_at",
        searchable:false,
        data: function ( row, type, val, meta ) {
            estado='<button type="button"  onClick="activar('+row.id+')" class="btn btn-success">Inactivo</button>';
            if (row.deleted_at===null){
                estado='<button type="button" onClick="desactivar('+row.id+')" class="btn btn-success">Activo</button>';
            }
            return estado;
        },
        defaultContent: '',
    }
];
var url = "api/fiscalizaciones";
var tableTools = {
    "aButtons": [
        "copy",
        "csv",
        "xls",
        {
            "sExtends": "pdf",
            "sTitle": "SmartAdmin_PDF",
            "sPdfMessage": "SmartAdmin PDF Export",
            "sPdfSize": "letter"
        },
        {
            "sExtends": "print",
            "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
        }
    ],
    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
};
var dataTable={
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "searching": true,
    "ordering": true,
    "stateLoadCallback": function (settings) {
        //$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
    },
    "stateSaveCallback": function (settings) { // Cuando finaliza el ajax
        //$(".overlay,.loading-img").remove();
    },
    ajax: function(data, callback, settings) {
        Tareas.getAll(data,callback);
    },
    "columns":columns,
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
    },
    "oTableTools": tableTools,
    "autoWidth" : true,
    "preDrawCallback" : function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
            responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#'+tabla), breakpointDefinition);
        }
    },
    "rowCallback" : function(nRow,data) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
        responsiveHelper_datatable_tabletools.respond();
    }
};
var datatable;
$(document).ready(function() {
    pageSetUp();
    $EmployeeNumber = $('#EmployeeNumber').select2();
    $tipo_tarea_id = $('#tipo_tarea_id').select2();
    $estado_tarea_id = $('#estado_tarea_id').select2();
    datatable = $('#'+tabla).DataTable(dataTable);

    Listas.all();
    $('#'+editar_modal).on('shown.bs.modal', function (event) {
        clearMapa();
        iniciarMapa('editar_mapa_tarea');
        addClickMarker();
        Tareas.get(vm.tarea.id);
    });
    $('#'+nuevo_modal).on('shown.bs.modal', function (event) {
        clearMapa();
        iniciarMapa('nuevo_mapa_tarea');
        addClickMarker();
    });
    $('#nav_modal a').on('shown.bs.tab', function(e){
        /*if ($(this)[0].hash=='#tab_datos') {
            $('#footer_datos').show();
            $('#footer_movimientos').hide();
        } else if ($(this)[0].hash=='#tab_movimientos'){
            $('#footer_datos').hide();
            $('#footer_movimientos').show();
        }*/
    });
    $('#' + nuevo_modal).on('hidden.bs.modal', function (event) {
        clearMapa();
        cleanData();
    });
});
/**
   
*/
editar=function(id){
    vm.tarea.id=id;
    vm.accion='editar';
    $("#"+editar_modal).modal();
};
desactivar=function(id){
    reload();
};
activar=function(id){
    reload();
};
reload=function(){
    datatable.ajax.reload(null,false);
};
clearMapa=function(){
    try { markerSpiderfier.clearMarkers(); }catch(c){}
    removeMarkers();
};
cleanData=function(){
    vm.tarea = [];
    vm.construcciones = [];
    vm.datos = [];
    vm.domicilios = [];
    vm.instalaciones = [];
    vm.propietarios = [];
    vm.ubicaciones = [];
    vm.a_anuncios = [];
    vm.a_autorizaciones = [];
    vm.a_biencomun = [];
    vm.a_comunes = [];
    vm.a_documentos = [];
    vm.a_masdatos = [];
    vm.a_propietarios = [];
    vm.a_ubicaciones = [];
};
iniciarMapa=function (id) {
    vm.map = new gm.Map(
        document.getElementById(id),
        mapOptions
    );
};
addClickMarker=function (id) {
    vm.map.addListener('click',function(event) {
        icon = "/img/icons/tap.png";
        vm.tarea.y = event.latLng.lat();
        vm.tarea.x = event.latLng.lng();
        removeMarkers();
        addMarker(event.latLng, 'Click Generated Marker',icon, true);
    });
    vm.bounds = new gm.LatLngBounds();
    markerSpiderfier = new OverlappingMarkerSpiderfier(vm.map, spiderConfig);
};

pintarMarkers=function () {
    if (vm.tarea.x==='') {
        vm.tarea.x =-12.1089753415548;
    }
    if (vm.tarea.y==='') {
        vm.tarea.y =-77.0160367806228;
    }
    var x = parseFloat( vm.tarea.x );
    var y = parseFloat( vm.tarea.y );
    var location = new gm.LatLng( y, x );
    addMarker( location, '', null,false);
    /*for (var i = vm.movimientos.length - 1; i >= 0; i--) {
        var coordx = parseFloat(vm.movimientos[i].coordx);
        var coordy = parseFloat(vm.movimientos[i].coordy);
        icon = "/img/icons/tap.png";
        label = "<label><b>"+vm.movimientos[i].created_at+"</b></label>";
        var location = new gm.LatLng(coordy, coordx);
        addMarker( location, label, icon,false);
    }*/
    var markerCluster = new MarkerClusterer(vm.map, vm.markers);
    markerCluster.setMaxZoom(config.minZoom);
    vm.map.fitBounds(vm.bounds);
};