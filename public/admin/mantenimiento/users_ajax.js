var Users={
    all:function(dataUsers){
        $.post( "user/all",
        function(response) {
            dataUsers(response);
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
        $.get( "user/"+id,
        function(response) {
            user = response;
            usuarioEdit();
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
    store:function(){
        $.post( "user",user,
        function(response) {
            user = response;
            usuarioEdit();
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
    update:function(){
        $.put('user/'+user.id,user, 
            function(response){
            console.log(response);
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
        $.delete( "user/"+id,
        function(response) {
            user = response;
            usuarioEdit();
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
        $.post( "user/all-paginate",
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