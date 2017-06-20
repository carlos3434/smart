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
        vm.rol.permissions = vm.permissions;
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
                //recorrer modulo

                //modulo1
                //recorrer sus permisos
                //se deberia llegar a esto
                var modulo =[
                    {
                        id:1,
                        permisos:[
                            {
                                id:1
                            },
                            {
                                id:2
                            },
                            {
                                id:3,
                                
                            },
                        ]
                    },
                    {
                        id:2,
                        permisos:[
                            {
                                id:1
                            },
                            {
                                id:2
                            },
                            {
                                id:3,
                                
                            },
                        ]
                    },
                ];
                //al final se debe recorrer modulos y permisos e ir pintando en la grilla de acuerdo a lo que se tiene

                //actualizar objeto moduloUser
                var submodulo;
                vm.jnks=[];
                var permisos=[];
                vm.submodulos = [];
                vm.permissions = [];
                if ($('#modulos').val()) {
                    for (var i = vm.modulos.length - 1; i >= 0; i--) {
                        submodulo = vm.modulos[i].children;
                        for (var j = submodulo.length - 1; j >= 0; j--) {
                            if ($('#modulos').val().indexOf(submodulo[j].id.toString()) >=0) {
                                //comparar si esta en permisos
                                
                                permisos=[];
                                for (var k = vm.rol.permissions.length - 1; k >= 0; k--) {
                                    //(vm.rol.permissions[k].submodulo_id)
                                    if (vm.rol.permissions[k].submodulo_id==submodulo[j].id.toString()) {
                                        //console.log(vm.rol.permissions[k]);
                                        //buscar los que se encuentren en true
                                        //aqui seria mejor armar un erray 
                                        //con las opciones del sistema
                                        //y en el frontend recorrerlo
                                        //es necesario pasarle el permido id para
                                        //que en el backend pueda actualizar el rol con los permisos
                                        vm.permissions.push({id:vm.rol.permissions[k].id});
                                        estado=false;
                                        if ( vm.rol.permissions[k].nombre.indexOf("read") ){
                                            submodulo[j].read=true;
                                            estado=true;
                                        }
                                        if ( vm.rol.permissions[k].nombre.indexOf("create") ){
                                            submodulo[j].create=true;
                                            estado=true;
                                        }
                                        if ( vm.rol.permissions[k].nombre.indexOf("update") ){
                                            submodulo[j].update=true;
                                            estado=true;
                                        }
                                        if ( vm.rol.permissions[k].nombre.indexOf("delete") ){
                                            submodulo[j].delete=true;
                                            estado=true;
                                        }
                                        permiso ={
                                            id:vm.rol.permissions[k].id,
                                            nombre:vm.rol.permissions[k].nombre_mostrar,
                                            estado:estado,
                                        };
                                        permisos.push(permiso);
                                    }
                                }
                                jnk = {
                                    id:submodulo[j].id,
                                    nombre:submodulo[j].nombre,
                                    permisos:permisos
                                };
                                vm.jnks.push(jnk);
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