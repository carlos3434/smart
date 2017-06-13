var Roles={
    all:function(){
        $.get( "api/roles",
        function(response) {
            //dataUsers(response);
            //alert( "success" );
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    get:function(id){
        $.get( "api/roles/"+id,
        function(response) {
            vm.rol = response;
            var modulosRol= [];
            for (var i = response.permissions.length - 1; i >= 0; i--) {
                modulosRol.push(response.permissions[i].submodulo_id);

            }
            $selectModulos.val(modulosRol).trigger("change");
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    /** guardar nuevo
    */
    store:function(){
        vm.user.submodulos = $('#modulos').val();
        vm.user.roles = $('#roles').val();
        $.post( "api/roles",vm.user,
        function(response) {
            //user = response;
            reload();
            //$('#'+tabla).DataTable().ajax.reload();
            $("#rolModal").modal('hide');
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    /** guardar existente
    */
    update:function(id){
        //vm.user.submodulos = submodulosUser;
        //vm.user.roles = $('#roles').val();
        //recorrer 
        vm.rol.submodulos = vm.submodulos;
        $.put('api/roles/'+id,vm.rol, 
            function(response){
            reload();
            //$('#'+tabla).DataTable().ajax.reload();
            $("#rolModal").modal('hide');
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    destroy:function(id){
        $.delete( "api/roles/"+id,
        function(response) {
            user = response;
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    allPaginate:function(dataUsersPag){
        $.post( "api/roles/all-paginate",
        { name: "John", time: "2pm" },
        function(response) {
            dataUsersPag(response);
            //alert( "success" );
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    },
    CambiarEstadoAreas:function(id,AD){

    }
};
var Modulos={
    all:function(/*dataUsers*/){
        $.get( "api/modulos", function(response) {
            vm.modulos = response;
            $selectModulos = $('#modulos').select2({
                dropdownParent: $('#rolModal')
            });

            $selectModulos.on("change", function (e) {
                //actualizar objeto moduloUser
                var submodulo;
                vm.submodulos = [];
                if ($('#modulos').val()) {
                    for (var i = vm.modulos.length - 1; i >= 0; i--) {
                        submodulo = vm.modulos[i].children;
                        for (var j = submodulo.length - 1; j >= 0; j--) {
                            if ($('#modulos').val().indexOf(submodulo[j].id.toString()) >=0) {
                                //comparar si esta en permisos
                                
                                for (var k = vm.rol.permissions.length - 1; k >= 0; k--) {
                                    //(vm.rol.permissions[k].submodulo_id)
                                    if (vm.rol.permissions[k].submodulo_id==submodulo[j].id.toString()) {
                                        //console.log(vm.rol.permissions[k]);
                                        //buscar los que se encuentren en true
                                        //aqui seria mejor armar un erray 
                                        //con las opciones del sistema
                                        //y en el frontend recorrerlo

                                        if ( vm.rol.permissions[k].nombre.indexOf("read") )
                                            submodulo[j].read=true;
                                        if ( vm.rol.permissions[k].nombre.indexOf("create") )
                                            submodulo[j].create=true;
                                        if ( vm.rol.permissions[k].nombre.indexOf("update") )
                                            submodulo[j].update=true;
                                        if ( vm.rol.permissions[k].nombre.indexOf("delete") )
                                            submodulo[j].delete=true;

                                    }
                                }
                                vm.submodulos.push(submodulo[j]);
                            }
                        }
                        
                    }
                }
            });
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    }
};
/*
var Roles={
    all:function(/){
        $.get( "roles/lista",
        function(response) {
            vm.roles = response;
            $selectRoles = $('#roles').select2({
                dropdownParent: $('#userModal')
            });
            //dataUsers(response);
            //alert( "success" );
        })
        .done(function(response) {
            //alert( "second success" );
        })
        .fail(function(response) {
            //alert( "error" );
        })
        .always(function(response) {
            //alert( "finished" );
        });
    }
};*/