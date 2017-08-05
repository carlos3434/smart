//Vue.component('v-select', VueSelect.VueSelect);
var vm = new Vue({
    el: '#main',
    data: {
        rol:{},
        permissions: [],
        modulos: [],//select modulos
        submodulos: [],//grilla de check
        accion:''
    },

    methods: {
        /**boton de modal Guardar*/
        guardarRole: function () {
            if (vm.accion=='nuevo') {
                Roles.store();
            } else {
                Roles.update(vm.rol.id);
            }
        },
        /**boton llama a modal, nuevo rol */
        storeRole: function () {
            $("#rolModal").modal();
            vm.accion = 'nuevo';
            vm.rol = {};
            
            $selectModulos.val([]).trigger("change");
        },
        modulos: function(){
            Modulos.all();
        },
        roles: function(){
            Roles.all();
        },
    },
});

var tabla='datatable_tabletools';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectModulos;
//var $selectRoles;

var breakpointDefinition = {
    tablet : 1024,
    phone : 480
};

var columnDefs=[
    {
        "targets": 0,
        "data": "id",
        "name": "id",
        "searchable":false
    },
    {
        "targets": 1,
        "data": "nombre",
        "name": "nombre"
    },
    {
        "targets": 2,
        "data": "nombre_mostrar",
        "name": "nombre_mostrar"
    },
    {
        "targets": 3,
        "data": "descripcion",
        "name": "descripcion",
        "searchable":false
    },
    {
        "targets": 4,
        "name": "updated_at",
        "searchable":false,
        "data": function ( row, type, val, meta ) {
            return '<td><button type="button" onClick="editar('+row.id+')" class="btn btn-primary">Editar</button></td>';
        },
        "defaultContent": '',
    },
    {
        "targets": 5,
        "name": "deleted_at",
        "searchable":false,
        "data": function ( row, type, val, meta ) {
            estado='<button type="button"  onClick="activar('+row.id+')" class="btn btn-success">Inactivo</button>';
            if (row.deleted_at===null){
                estado='<button type="button" onClick="desactivar('+row.id+')" class="btn btn-success">Activo</button>';
            }
            return estado;
        },
        "defaultContent": '',
    }
];

var dataTable={
    "processing": true,
    "serverSide": true,
    "stateSave": true,
    "searching": true,
    "ordering": true,
    "stateLoadCallback": function (settings) {
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
    },
    "stateSaveCallback": function (settings) { // Cuando finaliza el ajax
        $(".overlay,.loading-img").remove();
    },
    "ajax": {
        "url": "api/roles",
        "type": "GET",
        "data": function(d){
            d.per_page=d.length;
            d.page=(d.start+d.length)/d.length;
            d.filter=d.search.value;
        },
    },
    columnDefs,
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oLanguage": {
        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
    },
    "oTableTools": {
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
    },
    "autoWidth" : true,
    "preDrawCallback" : function() {
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
    Modulos.all();
    Permisos.all();
    datatable = $('#'+tabla).DataTable(dataTable);
});
/**
   boton llama a modal, editar rol
*/
editar=function(id){
    vm.accion='editar';
    Roles.get(id);
    $("#rolModal").modal();
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
/**
* obtener los submodulos del rol
*/
modulosRol=function(){
    var modulosRol= [];
    for (var i = vm.rol.permissions.length - 1; i >= 0; i--) {
        modulosRol.push(vm.rol.permissions[i].submodulo_id);
    }
    $selectModulos.val(modulosRol).trigger("change");
};
/**
* obtener los submodulos del rol
*/
modulos=function(){
    $selectModulos = $('#modulos').select2({
        dropdownParent: $('#rolModal')
    });

    $selectModulos.on("change", function (e) {  
        var submodulo;
        vm.submodulos=[];
        var permisos=[];

        if ($('#modulos').val()) {
            for (var i = vm.modulos.length - 1; i >= 0; i--) {
                submodulo = vm.modulos[i].children;
                for (var j = submodulo.length - 1; j >= 0; j--) {
                    if ($('#modulos').val().indexOf(submodulo[j].id.toString()) >=0) {
                        permisos=[];

                        if (vm.accion=='nuevo') {
                            for (var l = vm.permissions.length - 1; l >= 0; l--) {
                                if (vm.permissions[l].submodulo_id==submodulo[j].id.toString()) {
                                    permiso ={
                                        id:vm.permissions[l].id,
                                        nombre:vm.permissions[l].nombre_mostrar,
                                        orden:vm.permissions[l].orden,
                                        estado:false,
                                    };
                                    permisos.push(permiso);
                                }
                            }
                        } else {

                            for (var k = vm.rol.permissions.length - 1; k >= 0; k--) {
                                if (vm.rol.permissions[k].submodulo_id==submodulo[j].id.toString()) {
                                    permiso ={
                                        id:vm.rol.permissions[k].id,
                                        nombre:vm.rol.permissions[k].nombre_mostrar,
                                        orden:vm.rol.permissions[k].orden,
                                        estado:true,
                                    };
                                    permisos.push(permiso);
                                }
                            }
                            for (var l = vm.permissions.length - 1; l >= 0; l--) {
                                permissions = vm.permissions[l];
                                if (vm.permissions[l].submodulo_id==submodulo[j].id.toString()) {
                                    flag=false;
                                    for ( k = vm.rol.permissions.length - 1; k >= 0; k--) {
                                        if ( vm.rol.permissions[k].id == vm.permissions[l].id ) {
                                            flag=true;
                                        }
                                    }
                                    if (flag===false) {
                                        permiso ={
                                            id:vm.permissions[l].id,
                                            nombre:vm.permissions[l].nombre_mostrar,
                                            orden:vm.permissions[l].orden,
                                            estado:false,
                                        };
                                        permisos.push(permiso);
                                    }
                                }
                            }
                        }
                        permisos.sort( function(a,b){
                            return a.orden - b.orden;
                        });
                        vm.submodulos.push({
                            id:submodulo[j].id,
                            nombre:submodulo[j].nombre,
                            permisos:permisos
                        });
                    }
                }
            }
        }
    });
};