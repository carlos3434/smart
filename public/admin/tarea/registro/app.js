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
            vm.movimientos = response.data.movimientos;
            pintarMapa();
            //roles();
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();

        axios.post(url, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
        }).catch(function (e) {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update: function update(id) {
        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();
        axios.put(url + '/' + id, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
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
/*
var $validator = $("#wizard-1").validate({
  
  rules: {
    email: {
      required: true,
      email: "Your email address must be in the format of name@domain.com"
    },
    fname: {
      required: true
    },
    lname: {
      required: true
    },
    country: {
      required: true
    },
    city: {
      required: true
    },
    postal: {
      required: true,
      minlength: 4
    },
    wphone: {
      required: true,
      minlength: 10
    },
    hphone: {
      required: true,
      minlength: 10
    }
  },
  
  messages: {
    fname: "Please specify your First name",
    lname: "Please specify your Last name",
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    }
  },
  
  highlight: function (element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function (element) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
  },
  errorElement: 'span',
  errorClass: 'help-block',
  errorPlacement: function (error, element) {
    if (element.parent('.input-group').length) {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element);
    }
  }
});

$('#bootstrap-wizard-1').bootstrapWizard({
  'tabClass': 'form-wizard',
  'onNext': function (tab, navigation, index) {
    var $valid = $("#wizard-1").valid();
    if (!$valid) {
      $validator.focusInvalid();
      return false;
    } else {
      $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
        'complete');
      $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
      .html('<i class="fa fa-check"></i>');
    }
  }
});


// fuelux wizard
var wizard = $('.wizard').wizard();

wizard.on('finished', function (e, data) {
  //$("#fuelux-wizard").submit();
  //console.log("submitted!");
  $.smallBox({
    title: "Congratulations! Your form was submitted",
    content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
    color: "#5F895F",
    iconSmall: "fa fa-check bounce animated",
    timeout: 4000
  });
  
});
*/
var vm = new Vue({
    el: '#main',
    data: {
        //user:{},
        //roles: [],
        errors: [],
        tarea: [],
        accion: '',

        movimientos: [],
        map: [],
        markers: [],
        bounds: [],
        line: [],
        nomarkers: []
    },
    methods: {
        /**boton de modal Guardar*/
        guardarUser: function guardarUser() {
            if (vm.accion == 'nuevo') {
                Tareas.store();
            } else {
                Tareas.update(vm.tarea.id);
            }
        },
        /**boton llama a modal, nuevo user */
        storeUser: function storeUser() {
            $("#modal-tarea").modal();
            vm.accion = 'nuevo';
            vm.tarea = {};
            $selectRoles.val([]).trigger("change");
        },
        roles: function roles() {
            Roles.all();
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
addMarker = function addMarker(coordy, coordx, label, icon) {
    var location = new gm.LatLng(coordy, coordx);
    var marker = new gm.Marker({
        position: location,
        //icon: icon,
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

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectRoles;

var breakpointDefinition = {
    tablet: 1024,
    phone: 480
};

var columns = [{
    data: "TaskNumber",
    name: "TaskNumber",
    searchable: false
}, {
    data: "EmployeeNumber",
    name: "EmployeeNumber",
    searchable: false
}, {
    data: "trabajador",
    name: "trabajador",
    searchable: false
}, {
    data: "Description",
    name: "Description",
    searchable: false
}, {
    data: "tipo",
    name: "tipo",
    searchable: false
}, {
    data: "estado",
    name: "estado",
    searchable: false
}, {
    name: "created_at",
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
var url = "api/tareas";
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
    //Roles.all();
    datatable = $('#' + tabla).DataTable(dataTable);
    //$('#st-detalle a').on('shown.bs.tab', function(e){

    $('#modal-tarea').on('shown.bs.modal', function (event) {
        //if ($(this)[0].hash=='#mapa') {
        //pintarMapa();
        //}
        Tareas.get(vm.tarea.id);
    });
});
/**
   
*/
editar = function editar(id) {
    vm.tarea.id = id;
    vm.accion = 'editar';
    $("#modal-tarea").modal();
    //Tareas.get(id);
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
pintarMapa = function pintarMapa() {
    try {
        markerSpiderfier.clearMarkers();
    } catch (c) {}
    removeMarkers();
    vm.map = new gm.Map(document.getElementById("mapa_tarea"), mapOptions);
    markerSpiderfier = new OverlappingMarkerSpiderfier(vm.map, spiderConfig);

    vm.bounds = new gm.LatLngBounds();
    //var icon = "img/icons/tec_0e8499.png";
    for (var i = vm.movimientos.length - 1; i >= 0; i--) {
        var coordx = parseFloat(vm.movimientos[i].coordx);
        var coordy = parseFloat(vm.movimientos[i].coordy);
        icon = "/img/icons/tap.png";
        label = "<label><b>TAP</b></label>";
        addMarker(coordy, coordx, label, icon);
    }
    var markerCluster = new MarkerClusterer(vm.map, vm.markers);
    markerCluster.setMaxZoom(config.minZoom);
    vm.map.fitBounds(vm.bounds);
};
/*
roles=function(){
    var rolesUser=[];
    for ( i = vm.user.roles.length - 1; i >= 0; i--) {
        rolesUser.push(vm.user.roles[i].id);
    }
    $selectRoles.val(rolesUser).trigger("change");
};*/