var tableColumns = [
    /*{
        name: 'id',
        title: '',
        dataClass: 'text-center',
        callback: 'showDetailRow'
    },*/
    {
        title: 'DNI',
        name: 'dni',
        sortField: 'dni',
    },
    {
        title: 'APELLIDOS',
        name: 'apellidos',
        sortField: 'apellidos',
    },
    {
        title: 'NOMBRES',
        name: 'nombres',
        sortField: 'nombres'
    },
    {
        title: 'NACIMIENTO',
        name: 'fecha_nacimiento',
        sortField: 'fecha_nacimiento',
        callback: 'formatDate|DD-MM-YYYY',
    },
    {
        title: '[]',
        name: '__slot:actions',
        //sortField: 'nombres'
    },/*
    {
        title: 'TIPO REPRESENTANTE',
        name: 'representante_legal',
        sortField: 'representante_legal',
        callback: 'tipoRepresentante',
    },*/
];
Vue.component('my-detail-row', {
    template: [
        '<div class="detail-row ui form" @click="onClick($event)">',
            '<div class="inline field">',
                '<label>Name: </label>',
                '<span>@{{rowData.name}}</span>',
            '</div>',
            '<div class="inline field">',
                '<label>Email: </label>',
                '<span>@{{rowData.email}}</span>',
            '</div>',
            '<div class="inline field">',
                '<label>Nickname: </label>',
                '<span>@{{rowData.nickname}}</span>',
            '</div>',
            '<div class="inline field">',
                '<label>Birthdate: </label>',
                '<span>@{{rowData.birthdate}}</span>',
            '</div>',
            '<div class="inline field">',
                '<label>Gender: </label>',
                '<span>@{{rowData.gender}}</span>',
            '</div>',
        '</div>',
    ].join(''),
    props: {
        rowData: {
            type: Object,
            required: true
        }
    },
    methods: {
        onClick: function(event) {
            //console.log('my-detail-row: on-click');
        }
    },
});

//Vue.use(Vuetable);
//Vue.use(VuetablePagination);
const vm = new Vue({
    el: '#main',
    /*components:{
   'vuetable-pagination': Vuetable.VuetablePagination
  },
    components:{
       'vuetable-pagination': Vuetable.VuetablePagination,
       'vuetable-pagination-info': Vuetable.VuetablePaginationInfo
    },*/
    data: {
        searchFor: '',
        fields: tableColumns,
        sortOrder: [{
            field: 'paterno',
            direction: 'asc'
        },
        {
            field: 'materno',
            direction: 'asc'
        },
        {
            field: 'nombre',
            direction: 'asc'
        }],
        multiSort: true,
        perPage: 2,
        paginationComponent: 'vuetable-pagination',
        paginationInfoTemplate: 'Mostrando {from} hasta {to} de {total} items',
                
        itemActions: [
            { name: 'edit-item', label: '', icon: 'glyphicon glyphicon-pencil', class: 'btn btn-warning', extra: {title: 'Edit', 'data-toggle':"tooltip", 'data-placement': "top"} }
        ],

        moreParams: {},
        query_params:{ 
            sort: '',
            page: '1',
            per_page: '2'
        },
sortorder:'',
pageNo:'1',
pagesize:'2',

        user:{},
        roles: [],
        accion:'',
        options: {
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              "token" : document.querySelector('#token').getAttribute('value')
            }
        }
    },

    watch: {
        'perPage': function(val, oldVal) {
            this.$broadcast('vuetable:refresh');
        },
        'paginationComponent': function(val, oldVal) {
            this.$broadcast('vuetable:load-success', this.$refs.vuetable.tablePagination);
            this.paginationConfig(this.paginationComponent);
        }
    },

    methods: {
        /**
         * Callback functions
         */
        estado: function(value) {
            switch(value) {
                case 1:
                    return 'Activo';
                case 0:
                    return 'Inactivo';
                    return '';
            }
        },
        tipoRepresentante: function(value) {
            switch(value) {
                case 0:
                    return 'Trabajador';
                case 1:
                    return 'Representante';
                default:
                    return '';
            }
        },
        formatDate: function(value, fmt) {
            if (value == null) return '';
            fmt = (typeof fmt == 'undefined') ? 'D MMM YYYY' : fmt;
            return moment(value, 'YYYY-MM-DD').format(fmt);
        },
        showDetailRow: function(value) {
            var icon = this.$refs.vuetable.isVisibleDetailRow(value) ? 'glyphicon glyphicon-minus-sign' : 'glyphicon glyphicon-plus-sign';
            return [
                '<a class="show-detail-row">',
                    '<i class="' + icon + '"></i>',
                '</a>'
            ].join('');
        },
        /**
         * Other functions
         */
        setFilter: function() {
            this.moreParams = [
                'empresa_id='+app.empresaSelec,
                'filter=' + this.searchFor
            ];
            this.$nextTick(function() {
                this.$broadcast('vuetable:refresh');
            });
        },
        resetFilter: function() {
            this.searchFor = '';
            this.setFilter();
        },
        preg_quote: function( str ) {
            return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
        },
        highlight: function(needle, haystack) {
            return haystack.replace(
                new RegExp('(' + this.preg_quote(needle) + ')', 'ig'),
                '<span class="highlight">$1</span>'
            );
        },
        rowClassCB: function(data, index) {
            return (index % 2) === 0 ? 'positive' : '';
        },
        paginationConfig: function(componentName) {
            //console.log('paginationConfig: ', componentName);
            if (componentName == 'vuetable-pagination') {
                this.$broadcast('vuetable-pagination:set-options', {
                    wrapperClass: 'pagination',
                    icons: { first: '', prev: '', next: '', last: ''},
                    activeClass: 'active',
                    linkClass: 'btn btn-default',
                    pageClass: 'btn btn-default'
                });
            }
            if (componentName == 'vuetable-pagination-dropdown') {
                this.$broadcast('vuetable-pagination:set-options', {
                    wrapperClass: 'form-inline',
                    icons: { prev: 'glyphicon glyphicon-chevron-left', next: 'glyphicon glyphicon-chevron-right' },
                    dropdownClass: 'form-control'
                });
            }
        },


        onPaginationData : function(paginationData) {
            this.$refs.pagination.setPaginationData(paginationData);
        },
        onChangePage : function(page) {
          this.$refs.vuetable.changePage(page);
        },
        editRow: function(rowData){
          alert("You clicked edit on"+ JSON.stringify(rowData));
        },
        deleteRow: function(rowData){
          alert("You clicked delete on"+ JSON.stringify(rowData));
        },
        /**boton de modal Guardar*/
        guardarUser: function () {
            if (vm.accion=='nuevo') {
                Users.store();
            } else {
                Users.update(vm.user.id);
            }
        },
        /**boton llama a modal, nuevo user */
        storeUser: function () {
            $("#userModal").modal();
            vm.accion = 'nuevo';
            vm.user = {};
            $selectRoles.val([]).trigger("change");
        },
        roles: function(){
            Roles.all();
        },
    },

    events: {
        'vuetable:row-changed': function(data) {
            //console.log('row-changed:', data.name);
        },
        'vuetable:row-clicked': function(data, event) {
            //console.log('row-clicked:', data.name);
        },
        'vuetable:cell-clicked': function(data, field, event) {
            //console.log('cell-clicked:', field.name);
            if (field.name !== '__actions') {
                this.$broadcast('vuetable:toggle-detail', data.id);
            }
        },
        'vuetable:loading': function() {
            var moreParams='empresa_id='+app.empresaSelec;
            this.$set('moreParams', [moreParams]);
        },
        'vuetable:load-success': function(response) {
            this.empresas = response.data.data;
        },
        'vuetable:load-error': function(response) {
            if (response.status == 400) {
                sweetAlert('Something\'s Wrong!', response.data.message, 'error');
            } else {
                sweetAlert('Oops', E_SERVER_ERROR, 'error');
            }
        }
    }
});


var tabla='datatable_tabletools';

/* BASIC ;*/
var responsiveHelper_datatable_tabletools = undefined;

var $selectRoles;

var breakpointDefinition = {
    tablet : 1024,
    phone : 480
};

var columnDefs=[
    {
        //"targets": 0,
        "data": "id",
        "name": "id",
        "searchable":false
    },
    {
        //"targets": 1,
        "data": "nombres",
        "name": "nombres"
    },
    {
        //"targets": 2,
        "data": "apellidos",
        "name": "apellidos"
    },
    {
        //"targets": 3,
        "data": "numero_telefono",
        "name": "numero_telefono",
        "searchable":false
    },
    {
        //"targets": 4,
        "data": "genero",
        "name": "genero",
        "searchable":false
    },
    {
        //"targets": 5,
        "name": "verified",
        "searchable":false,
        "data": function ( row, type, val, meta ) {
            return '<td><button type="button" onClick="editar('+row.id+')" class="btn btn-primary">Editar</button></td>';
        },
        "defaultContent": '',
    },
    {
        //"targets": 6,
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
        "url": "api/users",
        "type": "GET",
        "data": function(d){
            d.per_page=d.length;
            d.page=(d.start+d.length)/d.length;
            d.filter=d.search.value;
        },
    },
    "columns":columnDefs,
    "columnDefs": [
        {
            "targets": 5,
            "orderable": false,
            "searchable": false
        },
    ],
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
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
            responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#'+tabla), breakpointDefinition);
        }
    },
    "rowCallback" : function(nRow,data) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
        //users = oSettings.aoData;
        responsiveHelper_datatable_tabletools.respond();
    }
};
var datatable;
$(document).ready(function() {
    //pageSetUp();
    Roles.all();
    datatable = $('#'+tabla).DataTable(dataTable);
});
/**
   
*/
editar=function(id){
    vm.accion='editar';
    Users.get(id);
    $("#userModal").modal();
};
desactivar=function(id){
    console.log(id);
    reload();
};
activar=function(id){
    console.log(id);
    reload();
};
reload=function(){
    datatable.ajax.reload(null,false);
};
roles=function(){
    var rolesUser=[];
    for ( i = vm.user.roles.length - 1; i >= 0; i--) {
        rolesUser.push(vm.user.roles[i].id);
    }
    $selectRoles.val(rolesUser).trigger("change");
};