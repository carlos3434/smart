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
            vm.movimientos = response.data.movimientos;
            pintarMarkers();
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
            $("#modal-tarea").modal('hide');
        })
        .catch(e => {
            vm.errors.push(e);
        });
    },
    /** guardar existente
    */
    update:function(id){
        axios.put(
            url+'/'+id,
            vm.tarea,
            headerAxios
        )
        .then(response => {
            reload();
            $("#modal-tarea").modal('hide');
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