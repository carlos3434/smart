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
            var i;
            for ( i = vm.a_anuncios.length - 1; i >= 0; i--) {
                console.log(vm.a_anuncios[i].id );
            }
            for ( i = vm.a_autorizaciones.length - 1; i >= 0; i--) {
                console.log(vm.a_autorizaciones[i].id );
            }
            for ( i = vm.a_biencomun.length - 1; i >= 0; i--) {
                console.log(vm.a_biencomun[i].id );
            }
            for ( i = vm.a_comunes.length - 1; i >= 0; i--) {
                console.log(vm.a_comunes[i].id );
            }
            for ( i = vm.a_documentos.length - 1; i >= 0; i--) {
                console.log(vm.a_documentos[i].id );
            }
            for ( i = vm.a_masdatos.length - 1; i >= 0; i--) {
                console.log(vm.a_masdatos[i].id );
            }
            for ( i = vm.a_propietarios.length - 1; i >= 0; i--) {
                console.log(vm.a_propietarios[i].id );
            }
            for ( i = vm.a_ubicaciones.length - 1; i >= 0; i--) {
                console.log(vm.a_ubicaciones[i].id );
            }
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