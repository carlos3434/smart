var Tareas = {
    getAll: function getAll(data, callback) {
        data.per_page = data.length;
        data.page = (data.start + data.length) / data.length;
        data.filter = data.search.value;
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function (response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get: function get(id) {
        axios.get(url + '/' + id, headerAxios).then(function (response) {
            vm.tarea = response.data;

            vm.construcciones = response.data.construcciones;
            vm.datos = response.data.datos;
            vm.domicilios = response.data.domicilios;
            vm.instalaciones = response.data.instalaciones;
            vm.propietarios = response.data.propietarios;
            vm.ubicaciones = response.data.ubicaciones;

            vm.a_anuncios = response.data.a_anuncios;
            vm.a_autorizaciones = response.data.a_autorizaciones;
            vm.a_biencomun = response.data.a_biencomun;
            vm.a_comunes = response.data.a_comunes;
            vm.a_documentos = response.data.a_documentos;
            vm.a_masdatos = response.data.a_masdatos;
            vm.a_propietarios = response.data.a_propietarios;
            vm.a_ubicaciones = response.data.a_ubicaciones;

            pintarMarkers();
            $EmployeeNumber.val(vm.tarea.EmployeeNumber).trigger("change");
            $tipo_tarea_id.val(vm.tarea.tipo_tarea_id).trigger("change");
            $estado_tarea_id.val(vm.tarea.estado_tarea_id).trigger("change");
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        axios.post(url, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#" + nuevo_modal).modal('hide');
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update: function update() {
        axios.put(url + '/' + vm.tarea.id, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#" + editar_modal).modal('hide');
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    destroy: function destroy(id) {
        axios.delete(url + '/' + id, headerAxios).then(function (response) {
            user = response;
        }).catch(function (e) {
            vm.errors.push(e);
        });
    }
};
var Listas = {
    all: function all() {
        var _this = this;

        axios.all([axios.get('trabajadores/lista', headerAxios), axios.get('estadotarea/lista', headerAxios), axios.get('tipotarea/lista', headerAxios)]).then(axios.spread(function (trabajadores, estadotarea, tipotarea) {
            vm.trabajadores = trabajadores.data;
            vm.estadotarea = estadotarea.data;
            vm.tipotarea = tipotarea.data;
        })).catch(function (e) {
            _this.errors.push(e);
        });
    }
};
var Formulario = {
    get: function get(id) {
        var header = headerAxios;
        header.params = {
            movimiento_id: id
        };
        axios.get('formularios/lista', header).then(function (response) {
            vm.formulario = response.data;
            vm.imagenes = response.data.imagenes;
        }).catch(function (e) {
            vm.errors.push(e);
        });
    }
};
var vm = new Vue({
    el: '#main',
    data: {
        errors: [],
        tarea: [],
        accion: '',
        construcciones: [],
        datos: [],
        domicilios: [],
        instalaciones: [],
        propietarios: [],
        ubicaciones: [],
        a_anuncios: [],
        a_autorizaciones: [],
        a_biencomun: [],
        a_comunes: [],
        a_documentos: [],
        a_masdatos: [],
        a_propietarios: [],
        a_ubicaciones: [],
        formulario: [],
        imagenes: [],
        trabajadores: [],
        tipotarea: [],
        estadotarea: [],
        map: [],
        markers: [],
        bounds: [],
        line: [],
        nomarkers: []
    },
    methods: {
        guardarNuevo: function guardarNuevo() {
            vm.tarea.DueDate = $('input[name=DueDate_nuevo]').val();
            vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
            vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
            vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
            Tareas.store();
        },
        guardarEditar: function guardarEditar() {
            vm.tarea.DueDate = $('input[name=DueDate_editar]').val();
            vm.tarea.estado_tarea_id = $('#estado_tarea_id').val();
            vm.tarea.tipo_tarea_id = $('#tipo_tarea_id').val();
            vm.tarea.EmployeeNumber = $('#EmployeeNumber').val();
            Tareas.update();
        },
        /**boton llama a modal, nuevo user */
        abrirNuevoModal: function abrirNuevoModal() {
            $("#" + nuevo_modal).modal();
            vm.accion = 'nuevo';
            vm.tarea = {};
            vm.construcciones = {};
        },
        roles: function roles() {
            Roles.all();
        },
        verFormulario: function verFormulario(id) {
            Formulario.get(id);
        }
    }
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
removeMarkers = function removeMarkers() {
    for (var i = 0; i < vm.markers.length; i++) {
        vm.markers[i].setMap(null);
    }
    vm.markers = [];
};

addMarker = function addMarker(location, label, icon, drag) {
    var marker = new gm.Marker({
        position: location,
        //icon: icon,
        draggable: drag,
        map: vm.map
    });
    vm.markers.push(marker);
    vm.bounds.extend(location);
    marker.infowindow = new gm.InfoWindow({ content: label });

    gm.event.addListener(marker, 'click', function () {
        if (infoWindows.length > 0) {
            for (var j = 0; j < infoWindows.length; j++) {
                infoWindows[j].close();
            }
        }
        this.infowindow.open(vm.map, this);
        infoWindows.push(this.infowindow);
    });
    markerSpiderfier.addMarker(marker);
};

////////////////////////////
var tabla = 'tabla_registro_tarea';
var editar_modal = 'editar_modal'; //modal-tarea
var nuevo_modal = 'nuevo_modal';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $EmployeeNumber;
var $tipo_tarea_id;
var $estado_tarea_id;

var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

var columns = [{
    data: "ficha_p",
    name: "ficha_p",
    searchable: false
}, {
    data: "codigo_p",
    name: "codigo_p",
    searchable: false
}, {
    data: "FirstName",
    name: "FirstName",
    searchable: false
}, {
    data: "nombres_declarantes",
    name: "nombres_declarantes",
    searchable: false
}, {
    data: "dni_declarantes",
    name: "dni_declarantes",
    searchable: false
}, {
    data: "nombres_propietarios",
    name: "nombres_propietarios",
    searchable: false
}, {
    data: "dni_propietario",
    name: "dni_propietario",
    searchable: false
}, {
    data: "nombres_fiscalizador",
    name: "nombres_fiscalizador",
    searchable: false
}, {
    data: "dni_fiscalizador",
    name: "dni_fiscalizador",
    searchable: false
}, {
    data: "created_at",
    name: "created_at",
    searchable: false
}, {
    data: "observaciones",
    name: "observaciones",
    searchable: false
}, {
    name: "edicion",
    searchable: false,
    data: function data(row, type, val, meta) {
        return '<td><button type="button" onClick="editar(' + row.id + ')" class="btn btn-primary">Editar</button></td>';
    },
    "defaultContent": ''
}, {
    name: "deleted_at",
    searchable: false,
    data: function data(row, type, val, meta) {
        estado = '<button type="button"  onClick="activar(' + row.id + ')" class="btn btn-success">Inactivo</button>';
        if (row.deleted_at === null) {
            estado = '<button type="button" onClick="desactivar(' + row.id + ')" class="btn btn-success">Activo</button>';
        }
        return estado;
    },
    defaultContent: ''
}];
var url = "api/fiscalizaciones";
var tableTools = {
    "aButtons": ["copy", "csv", "xls", {
        "sExtends": "pdf",
        "sTitle": "SmartAdmin_PDF",
        "sPdfMessage": "SmartAdmin PDF Export",
        "sPdfSize": "letter"
    }, {
        "sExtends": "print",
        "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
    }],
    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
};
var dataTable = {
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "searching": true,
    "ordering": true,
    "stateLoadCallback": function stateLoadCallback(settings) {
        //$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
    },
    "stateSaveCallback": function stateSaveCallback(settings) {// Cuando finaliza el ajax
        //$(".overlay,.loading-img").remove();
    },
    ajax: function ajax(data, callback, settings) {
        Tareas.getAll(data, callback);
    },
    "columns": columns,
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
    },
    "oTableTools": tableTools,
    "autoWidth": true,
    "preDrawCallback": function preDrawCallback() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
            responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#' + tabla), breakpointDefinition);
        }
    },
    "rowCallback": function rowCallback(nRow, data) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback": function drawCallback(oSettings) {
        responsiveHelper_datatable_tabletools.respond();
    }
};
var datatable;
$(document).ready(function () {
    pageSetUp();
    $EmployeeNumber = $('#EmployeeNumber').select2();
    $tipo_tarea_id = $('#tipo_tarea_id').select2();
    $estado_tarea_id = $('#estado_tarea_id').select2();
    datatable = $('#' + tabla).DataTable(dataTable);

    Listas.all();
    $('#' + editar_modal).on('shown.bs.modal', function (event) {
        clearMapa();
        iniciarMapa('editar_mapa_tarea');
        addClickMarker();
        Tareas.get(vm.tarea.id);
    });
    $('#' + nuevo_modal).on('shown.bs.modal', function (event) {
        clearMapa();
        iniciarMapa('nuevo_mapa_tarea');
        addClickMarker();
    });
    $('#nav_modal a').on('shown.bs.tab', function (e) {
        /*if ($(this)[0].hash=='#tab_datos') {
            $('#footer_datos').show();
            $('#footer_movimientos').hide();
        } else if ($(this)[0].hash=='#tab_movimientos'){
            $('#footer_datos').hide();
            $('#footer_movimientos').show();
        }*/
    });
});
/**
   
*/
editar = function editar(id) {
    vm.tarea.id = id;
    vm.accion = 'editar';
    $("#" + editar_modal).modal();
};
desactivar = function desactivar(id) {
    reload();
};
activar = function activar(id) {
    reload();
};
reload = function reload() {
    datatable.ajax.reload(null, false);
};
clearMapa = function clearMapa() {
    try {
        markerSpiderfier.clearMarkers();
    } catch (c) {}
    removeMarkers();
};

iniciarMapa = function iniciarMapa(id) {
    vm.map = new gm.Map(document.getElementById(id), mapOptions);
};
addClickMarker = function addClickMarker(id) {
    vm.map.addListener('click', function (event) {
        icon = "/img/icons/tap.png";
        vm.tarea.coordy = event.latLng.lat();
        vm.tarea.coordx = event.latLng.lng();
        removeMarkers();
        addMarker(event.latLng, 'Click Generated Marker', icon, true);
    });
    vm.bounds = new gm.LatLngBounds();
    markerSpiderfier = new OverlappingMarkerSpiderfier(vm.map, spiderConfig);
};

pintarMarkers = function pintarMarkers() {
    /*for (var i = vm.movimientos.length - 1; i >= 0; i--) {
        var coordx = parseFloat(vm.movimientos[i].coordx);
        var coordy = parseFloat(vm.movimientos[i].coordy);
        icon = "/img/icons/tap.png";
        label = "<label><b>"+vm.movimientos[i].created_at+"</b></label>";
        var location = new gm.LatLng(coordy, coordx);
        addMarker( location, label, icon,false);
    }
    var markerCluster = new MarkerClusterer(vm.map, vm.markers);
    markerCluster.setMaxZoom(config.minZoom);
    vm.map.fitBounds(vm.bounds);*/
};