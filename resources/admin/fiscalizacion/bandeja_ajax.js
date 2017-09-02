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
            vm.prediouno = response.data.prediouno;
            vm.prediodos = response.data.prediodos;
            vm.prediotres = response.data.prediotres;
            vm.propietarios = response.data.propietarios;

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