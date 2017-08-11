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
        var _this = this;

        axios.get(url + '/' + id, headerAxios).then(function (response) {
            vm.tarea = response.data;
            //roles();
        }).catch(function (e) {
            _this.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store: function store() {
        var _this2 = this;

        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();

        axios.post(url, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
        }).catch(function (e) {
            _this2.errors.push(e);
        });
    },
    /** guardar existente
    */
    update: function update(id) {
        var _this3 = this;

        //vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        //vm.user.roles = $('#roles').val();
        axios.put(url + '/' + id, vm.tarea, headerAxios).then(function (response) {
            reload();
            $("#modal-tarea").modal('hide');
        }).catch(function (e) {
            _this3.errors.push(e);
        });
    },
    destroy: function destroy(id) {
        var _this4 = this;

        axios.delete(url + '/' + id, headerAxios).then(function (response) {
            user = response;
        }).catch(function (e) {
            _this4.errors.push(e);
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
        tarea: [],
        accion: ''
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
});
/**
   
*/
editar = function editar(id) {
    vm.accion = 'editar';
    Tareas.get(id);
    $("#modal-tarea").modal();
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
/*
roles=function(){
    var rolesUser=[];
    for ( i = vm.user.roles.length - 1; i >= 0; i--) {
        rolesUser.push(vm.user.roles[i].id);
    }
    $selectRoles.val(rolesUser).trigger("change");
};*/