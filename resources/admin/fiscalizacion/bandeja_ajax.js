var Tareas={
    getAll:function(data,callback){
        data.per_page=data.length;
        data.page=(data.start+data.length)/data.length;
        data.filter=data.search.value;
        $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
        $.get(url, data, function(response) {
            callback(response);
            $(".overlay,.loading-img").remove();
        });
    },
    get:function(id){
        axios.get(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            vm.tarea = response.data;

            vm.construcciones = response.data.construcciones;
            vm.datos = response.data.datos;
            vm.domicilios = response.data.domicilios;
            vm.instalaciones = response.data.instalaciones;
            vm.propietarios = response.data.propietarios;
            vm.ubicaciones = response.data.ubicaciones;
            vm.imagenes = response.data.imagenes;
            var i;
            for ( i = response.data.a_anuncios.length - 1; i >= 0; i--) {
                if (response.data.a_anuncios[i].anexo_id==1) {
                    vm.a_anuncios_01.push( response.data.a_anuncios[i] );
                } else if (response.data.a_anuncios[i].anexo_id==2) {
                    vm.a_anuncios_02.push( response.data.a_anuncios[i] );
                } else if (response.data.a_anuncios[i].anexo_id==3) {
                    vm.a_anuncios_03.push( response.data.a_anuncios[i] );
                }
            }

            for ( i = response.data.a_autorizaciones.length - 1; i >= 0; i--) {
                if (response.data.a_autorizaciones[i].anexo_id==1) {
                    vm.a_autorizaciones_01.push( response.data.a_autorizaciones[i] );
                } else if (response.data.a_autorizaciones[i].anexo_id==2) {
                    vm.a_autorizaciones_02.push( response.data.a_autorizaciones[i] );
                } else if (response.data.a_autorizaciones[i].anexo_id==3) {
                    vm.a_autorizaciones_03.push( response.data.a_autorizaciones[i] );
                }
            }

            for ( i = response.data.a_biencomun.length - 1; i >= 0; i--) {
                if (response.data.a_biencomun[i].anexo_id==1) {
                    vm.a_biencomun_01.push( response.data.a_biencomun[i] );
                } else if (response.data.a_biencomun[i].anexo_id==2) {
                    vm.a_biencomun_02.push( response.data.a_biencomun[i] );
                } else if (response.data.a_biencomun[i].anexo_id==3) {
                    vm.a_biencomun_03.push( response.data.a_biencomun[i] );
                }
            }

            for ( i = response.data.a_comunes.length - 1; i >= 0; i--) {
                if (response.data.a_comunes[i].anexo_id==1) {
                    vm.a_comunes_01.push( response.data.a_comunes[i] );
                } else if (response.data.a_comunes[i].anexo_id==2) {
                    vm.a_comunes_02.push( response.data.a_comunes[i] );
                } else if (response.data.a_comunes[i].anexo_id==3) {
                    vm.a_comunes_03.push( response.data.a_comunes[i] );
                }
            }
            
            for ( i = response.data.a_documentos.length - 1; i >= 0; i--) {
                if (response.data.a_documentos[i].anexo_id==1) {
                    vm.a_documentos_01.push( response.data.a_documentos[i] );
                } else if (response.data.a_documentos[i].anexo_id==2) {
                    vm.a_documentos_02.push( response.data.a_documentos[i] );
                } else if (response.data.a_documentos[i].anexo_id==3) {
                    vm.a_documentos_03.push( response.data.a_documentos[i] );
                }
            }

            for ( i = response.data.a_masdatos.length - 1; i >= 0; i--) {
                if (response.data.a_masdatos[i].anexo_id==1) {
                    vm.a_masdatos_01.push( response.data.a_masdatos[i] );
                } else if (response.data.a_masdatos[i].anexo_id==2) {
                    vm.a_masdatos_02.push( response.data.a_masdatos[i] );
                } else if (response.data.a_masdatos[i].anexo_id==3) {
                    vm.a_masdatos_03.push( response.data.a_masdatos[i] );
                }
            }

            for ( i = response.data.a_propietarios.length - 1; i >= 0; i--) {
                if (response.data.a_propietarios[i].anexo_id==1) {
                    vm.a_propietarios_01.push( response.data.a_propietarios[i] );
                } else if (response.data.a_propietarios[i].anexo_id==2) {
                    vm.a_propietarios_02.push( response.data.a_propietarios[i] );
                } else if (response.data.a_propietarios[i].anexo_id==3) {
                    vm.a_propietarios_03.push( response.data.a_propietarios[i] );
                }
            }

            for ( i = response.data.a_ubicaciones.length - 1; i >= 0; i--) {
                if (response.data.a_ubicaciones[i].anexo_id==1) {
                    vm.a_ubicaciones_01.push( response.data.a_ubicaciones[i] );
                } else if (response.data.a_ubicaciones[i].anexo_id==2) {
                    vm.a_ubicaciones_02.push( response.data.a_ubicaciones[i] );
                } else if (response.data.a_ubicaciones[i].anexo_id==3) {
                    vm.a_ubicaciones_03.push( response.data.a_ubicaciones[i] );
                }
            }
            vm.startRotation();
            pintarMarkers();
            $EmployeeNumber.val(vm.tarea.EmployeeNumber).trigger("change");
            $tipo_tarea_id.val(vm.tarea.tipo_tarea_id).trigger("change");
            $estado_tarea_id.val(vm.tarea.estado_tarea_id).trigger("change");

        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store:function(){
        axios.post(
            url,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#"+nuevo_modal).modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update:function(){
        axios.put(
            url+'/'+vm.tarea.id,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#"+editar_modal).modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    destroy:function(id){
        axios.delete(
            url+'/'+id,
            headerAxios
        )
        .then(response => {
            user = response;
        })
        .catch(e => {
            vm.errors.push(e);
        });
    }
};
var Listas ={
    all:function(){
        axios.all([
            axios.get('trabajadores/lista',headerAxios),
            axios.get('estadotarea/lista',headerAxios),
            axios.get('tipotarea/lista',headerAxios)
        ])
        .then(axios.spread(function (trabajadores,estadotarea,tipotarea) {
            vm.trabajadores = trabajadores.data;
            vm.estadotarea = estadotarea.data;
            vm.tipotarea = tipotarea.data;
        }))
        .catch(e => {
          this.errors.push(e);
        });
    }
};
var Formulario={
    get:function(id){
        var header =headerAxios;
        header.params= {
            movimiento_id: id
        };
        axios.get(
            'formularios/lista',
            header
        )
        .then(response => {
            vm.formulario = response.data;
            vm.imagenes = response.data.imagenes;
        })
        .catch(e => {
            vm.errors.push(e);
        });
    }
};