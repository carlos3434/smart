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
                vm.submodulos=[];
                var permisos=[];
                if ($('#modulos').val()) {
                    for (var i = vm.modulos.length - 1; i >= 0; i--) {
                        submodulo = vm.modulos[i].children;
                        for (var j = submodulo.length - 1; j >= 0; j--) {
                            if ($('#modulos').val().indexOf(submodulo[j].id.toString()) >=0) {
                                permisos=[];
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

var Permisos={
    all:function(){
        $.get( "api/permissions",
        function(response) {
            vm.permissions = response;
            //esto servira para que se pueda saber los permisos del sistema por modulo
            //al momento de pintar la grilla de permisos
            //se debera de jalar sus permisos
            //tambien servira para agrupar los permisos por modulos
            //para que sea mejor el envio de actualizacion de rol, ya que se enviara lo seleccionado
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