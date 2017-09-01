var Users={
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
            vm.user = response.data;
            roles();
        })
        .catch(e => {
            this.errors.push(e);
        });
    },
    /** guardar nuevo
    */
    store:function(){
        vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        vm.user.roles = $('#roles').val();

        axios.post(
            url,
            vm.user,
            headerAxios
        )
        .then(response => {
            reload();
            $("#userModal").modal('hide');
        })
        .catch(e => {
            this.errors.push(e);
        });
    },
    /** guardar existente
    */
    update:function(id){
        vm.user.fecha_nacimiento =  $('input[name=fecha_nacimiento]').val();
        vm.user.roles = $('#roles').val();
        axios.put(
            url+'/'+id,
            vm.user,
            headerAxios
        )
        .then(response => {
            reload();
            $("#userModal").modal('hide');
        })
        .catch(e => {
            this.errors.push(e);
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
            this.errors.push(e);
        });
    }
};
var Roles ={
    all:function(){
        axios.all([
            axios.get('roles/lista',headerAxios)
        ])
        .then(axios.spread(function (response) {
            vm.roles = response.data;
            $selectRoles = $('#roles').select2({
                dropdownParent: $('#userModal')
            });
        }))
        .catch(e => {
          this.errors.push(e);
        });
    }
};